<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\article;
use App\Http\Requests\PostFormRequest;
use App\Models\Comment;
use App\Models\Comments_article;

class ArticleController extends Controller
{
     /**
   * Display a listing of the resource.
   *
   * @return Response
   */
 
  public function show_blog()
  {
    $articles = article::all();
    return view('user.show_blog', compact('articles'));
  }
  public function blog($slug)
  {
    $article = article::where('slug', $slug)->first();
    $comments = Comments_article::where('on_article', 'LIKE', '%' . $article->id . '%');
    return view('user.blog',compact('article','comments'));
  }
  public function index()
  {
    $articles = article::all();
    return view('admin.article', compact('articles'));
  }
  public function show($slug)
  {
    $article = article::where('slug', $slug)->first();
    $comments = Comments_article::where('on_article', 'LIKE', '%' . $article->id . '%');
    return view('admin.show_article',compact('article','comments'));
  }
  public function edit($slug)
  {
      $article = article::where('slug', $slug)->first();
      return view('admin.blog_update',compact('article'));
  }

  public function create()
    {
      return view('admin.add_blog');
    }
  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $article = new article();
    $article->title = $request->get('title');
    $article->body = $request->get('body');
    $article->slug = Str::slug($article->title);

    $duplicate = article::where('slug', $article->slug)->first();
    if ($duplicate) {
      return redirect()->back()->withErrors('Title already exists.')->withInput();
    }

    $article->author_id = $request->user()->id;
    if ($request->has('save')) {
      $article->active = 0;
      $message = 'article saved successfully';
    } else {
      $article->active = 1;
      $message = 'article published successfully';
    }
    $article->save();
    return redirect()->back()->withMessage($message);
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request)
  {
    $article_id = $request->input('article_id');
    $article = article::find($article_id);
    if ($article) {
      $title = $request->input('title');
      $slug = Str::slug($title);
      $duplicate = article::where('slug', $slug)->first();
      if ($duplicate) {
        if ($duplicate->id != $article_id) {
          return redirect('edit/' . $article->slug)->withErrors('Title already exists.')->withInput();
        } else {
          $article->slug = $slug;
        }
      }
      $article->title = $title;
      $article->body = $request->input('body');

      if ($request->has('save')) {
        $article->active = 0;
        $message = 'article saved successfully';
        $landing = 'edit/' . $article->slug;
      } else {
        $article->active = 1;
        $message = 'Post updated successfully';
        $landing = $article->slug;
      }
      $article->save();
      return redirect($landing)->withMessage($message);
    } else {
      return redirect('/')->withErrors('you have not sufficient permissions');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request, $id)
  {
    //
    $article = article::find($id);
    if ($article ) {
      $article->delete();
      $data['message'] = 'article deleted Successfully';
    } else {
      $data['errors'] = 'Invalid Operation. You have not sufficient permissions';
    }

    return redirect('/')->with($data);
  }
}
