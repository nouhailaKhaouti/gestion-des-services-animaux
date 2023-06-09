<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\article;
use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller {
  /*
   * Display active posts of a particular user
   * 
   * @param int $id
   * @return view
   */
  public function user_posts($id)
  {
    //
    $articles = article::where('author_id',$id)->where('active',1)->orderBy('created_at','desc')->paginate(5);
    $title = User::find($id)->name;
    return view('home',compact('article','title'));
  }
  /*
   * Display all of the posts of a particular user
   * 
   * @param Request $request
   * @return view
   */
  public function user_posts_all(Request $request)
  {
    //
    $user = $request->user();
    $articles = article::where('author_id',$user->id)->orderBy('created_at','desc')->paginate(5);
    $title = $user->name;
    return view('home',compact('article','title'));
  }
  /*
   * Display draft posts of a currently active user
   * 
   * @param Request $request
   * @return view
   */
  public function user_posts_draft(Request $request)
  {
    //
    $user = $request->user();
    $articles = article::where('author_id',$user->id)->where('active',0)->orderBy('created_at','desc')->paginate(5);
    $title = $user->name;
    return view('home',compact('article','title'));
  }
  /**
   * profile for user
   */
  public function profile(Request $request, $id) 
  {
    $data['user'] = User::find($id);
    if (!$data['user'])
      return redirect('/');
    if ($request -> user() && $data['user'] -> id == $request -> user() -> id) {
      $data['author'] = true;
    } else {
      $data['author'] = null;
    }
    $data['comments_count'] = $data['user'] -> comments -> count();
    $data['articles_count'] = $data['user'] -> Article -> count();
    $data['articles_active_count'] = $data['user'] -> Article -> where('active', '1') -> count();
    $data['articles_draft_count'] = $data['articles_count'] - $data['articles_active_count'];
    $data['latest_articles'] = $data['user'] -> Article -> where('active', '1') -> take(5);
    $data['latest_comments'] = $data['user'] -> comments -> take(5);
    return view('admin.profile', $data);
  }
}