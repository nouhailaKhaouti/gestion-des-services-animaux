<?php

namespace App\Http\Controllers;

use App\Mail\NotifyPosts;
use App\Models\breed;
use App\Models\category;
use App\Models\post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\comment;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function post(Request $request)
    {
         $post=new post;       
         $video=$request->video;
         if($video)
         {
         //we create a new name for the image 
         $videoname=time().'.'.$video->getClientOriginalExtension();
         //and after we move it to an other file called doctorimage that will be created automaticly ones we upload the image 
         $request->video->move('profilevideo',$videoname);
         $post->video=$videoname;
         }
         $post->titre=$request->titre;
         $post->description=$request->description;
         $post->category_id=$request->category;
         $post->breed_id=$request->breed;
         $post->type=$request->type;
         $post->tag=$request->tag;
         $post->status='available';
        if(Auth::id())
        {
          $post->user_id=Auth::user()->id;
        }
        $post->save();
        $post_id=$post->id;
       if($request->hasfile('image'))
        {
         $files=$request->file('image') ;
          foreach($files as $file)
          {
            $image=new Image();
            $image_name=time().'-'.$file->getClientOriginalExtension();
            $image_name=str_replace('','-',$image_name);
            $file->move('postimage',$image_name);
            $image->image=$image_name;
            $image->post_id=$post_id;
            $image->save();
          }
        }
        $titre=$request->titre;
        foreach (User::all('email') as $email) {

          Mail::to($email)->send(new NotifyPosts(auth()->user()->username , $titre));
        }
        return redirect()->back()->with('message','post created successfuly');
    }
    public function update_post(Request $request,$id)
    {
        $post=Post::find($id);
        $video=$request->video;
        if($video)
        {
        //we create a new name for the image 
        $videoname=time().'.'.$video->getClientOriginalExtension();
        //and after we move it to an other file called doctorimage that will be created automaticly ones we upload the image 
        $request->video->move('profilevideo',$videoname);
        $post->video=$videoname;
         }
        $post->titre=$request->titre;
        $post->description=$request->description;
        $post->category_id=$request->category;
        $post->breed_id=$request->breed;
        $post->tag=$request->tag;
        $post->tag=$request->type;
        $post->status='available';
        if(Auth::id())
        {
          $post->user_id=Auth::user()->id;
        }
        $post->save();
        if($request->hasfile('image'))
         {
          $files=$request->file('image') ;
           foreach($files as $file)
           {
             $image=new Image;
             $image_name=time().'-'.$file->getClientOriginalExtension();
             $image_name=str_replace('','-',$image_name);
             $file->move('postimage',$image_name);
             $image->image=$image_name;
             $image->post_id=$id;
             $image->save();
           }
         }
         return redirect()->back()->with('message2', 'post updated successfuly');
    }
    /*   public function index(){
          $post_ad= post::all();
          re turn view('user.home', compact('post_ad'));
      }*/
  
    //public function post(){
    //  $db=DB::connection()->getPdo();
    //$rs=$db->query('SELECT * FROM posts where tag="adopt" ');
  
    //return view('user.adopt',compact('rs'));
    //}
    public function createpost()
    {
      return view('user.create_post');
    }  
    public function post_display()
    {
      if (Auth::id()) {
  
        $userid = Auth::user()->id;
        $profile = user::find($userid);
        $posts = post::where('user_id', $userid)->get();
        $categorys=category::all();
        $breeds=breed::all();
        return view('user.post_display', compact('posts', 'profile','categorys','breeds'));
      } else {
        return redirect()->back();
      }
    }
    public function delete($id)
    {
      $data=Post::find($id);
      $data->delete();
      return redirect()->back()->with('message6', 'post deleted successfuly');
    }
}
