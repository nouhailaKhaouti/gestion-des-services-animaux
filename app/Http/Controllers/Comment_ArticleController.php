<?php
namespace App\Http\Controllers;

use App\Models\Comments_article;
use Illuminate\Http\Request;

class Comment_ArticleController extends Controller
{
      /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    //on_post, from_user, body
    $input['from_user'] = $request->user()->id;
    $input['on_article'] = $request->input('on_article');
    $input['body'] = $request->input('body');
    $slug = $request->input('slug');
    Comments_article::create($input);

    return redirect()->back()->with('message', 'Comment published');
  }
}
