<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
  /*  public function nav()
    {
        $userid=Auth::user()->id;
        $profile=user::find($userid);
        return view('user.home', compact('profile'));
    }*/
  public function redirect()
  {
    if (Auth::id()) {
      if (Auth::User()->usertype == '0') {
        if(Auth::User()->acces!='denied')
      {
        $userid = Auth::user()->id;
        $profile = user::find($userid);
        $post_ad = post::all();
        return view('user.home', compact('post_ad', 'profile'));
      }
      } else {
        $user = User::select(DB::raw("COUNT(*) as count, Month(created_at)"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count','Month(created_at)');
        $users=user::all();
        return view('admin.home',compact('users','user'));
      }
    } else {
      return redirect()->back()->with('message','your not connected or you have been suspended for some raisons');
    }
  }
  public function index()
  {
    //if condition here is to stop redirection to home page when the admin is loged in
    if (Auth::id()) {
      return redirect('home');
    } else {
      $post_ad = post::all();
      return view('user.home', compact('post_ad'));
    }
  }
  public function adopt()
  {
    $userid = Auth::user()->id;
    $profile = user::find($userid);
    $tag = 'adopt';
    $posts = post::where('tag', 'LIKE', '%' . $tag . '%')->get();
    return view('user.adopt', compact('posts', 'profile'));
  }

  public function miss()
  {
    $userid = Auth::user()->id;
    $profile = user::find($userid);
    $tag = 'missing';
    $posts = post::where('tag', 'LIKE', '%' . $tag . '%')->get();
    return view('user.missing', compact('posts', 'profile'));
  }
  public function sitter()
  {
    $role = 'sitter';
    $users=user::where('role','LIKE','%' .$role . '%')->get();
    return view('user.show_sitter', compact('users'));
  }
  public function search(Request $request){

    $this->validate($request, ['search' => 'required|max:255']);
    $search = $request->search;
    $posts = post::where('titre', 'like', "%$search%")->paginate(10);
    $posts->appends(['search' => $search]);

    // $categories = Category::all();
    return view('user.search', compact('posts', 'search'));
}
public function sendmail(Request $request){
 
  $request->validate([
            'subject'=> 'required',
            'message'=>'required',
            'email'=>'required',
           ]);
  //dd($request);
  $data = array(
    'subject' => $request->subject, 
    'message'=> $request->message ,
     );
    Mail::to($request->email)->send(new Email($data));
    return back()->with('success', 'Sent Successfully !');

}
public function donation(){
  //if condition here is to stop redirection to home page when the admin is loged in
    return view('user.donation');
}


public function share_post()
  {
    $userid = Auth::user()->id;
    $profile = user::find($userid);
    $tag = 'normale';
    $posts = post::where('tag', 'LIKE', '%' . $tag . '%')->get();
    return view('user.share_post', compact('posts', 'profile'));
  }
}
