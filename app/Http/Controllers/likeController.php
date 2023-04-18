<?php

namespace App\Http\Controllers;

use App\Events\PostAction;
use Illuminate\Http\Request;
use App\Models\post;
class likeController extends Controller
{
  /*public function like($post){
        $user = Auth::user();
        $likePost = $user->likedPost()->where('post_id', $post)->count();
        if($likePost == 0){
            $user->likedPosts()->attach($post);
        } else{
            $user->likedPosts()->detach($post);
        }
        return redirect()->back();
        

}
     */
    public function likepl(Post $post)
    {
      $post->likePlus();
      return redirect()->back();
    }
    public function dislikepl(Post $post)
    {
      $post->dislikePlus();
      return redirect()->back();
    }
    function save_likedislike(Request $request,$id)
    {
      $data = post::find($id);
      if ($request->type == 'like') {
        $data->like = 1;
      } else {
        $data->dislike = 1;
      }
      $data->save();
      return response()->json([
        'bool' => true
      ]);
    }
    public function actOnPost(Request $request, $id)
    {
        $action = $request->get('action');
        switch ($action) {
            case 'Like':
                Post::where('id', $id)->increment('likes');
                break;
            case 'Unlike':
                Post::where('id', $id)->decrement('likes');
                break;
        }
        event(new PostAction($id, $action));
        return '';
    }
}
