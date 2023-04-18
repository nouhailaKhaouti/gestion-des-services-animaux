<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class commentController extends Controller
{
    public function comment(Request $request)
    {
      $input = $request->all();
  
      $request->validate([
        'description' => 'required',
      ]);
  
      $input['user_id'] = auth()->user()->id;
  
      Comment::create($input);
      return redirect()->back()->with('message3', 'comment created successfuly');
    }
    public function update_Comment(Request $request,$id)
    {
      $input=Comment::find($id);
      
      $input->description=$request->description;
      if(Auth::id())
        {
          $input->user_id=Auth::user()->id;
        }
      $input->save();
      return redirect()->back()->with('message4', 'comment updated successfuly');
    }
    public function delete($id)
    {

      $data=Comment::find($id);
      $data->delete();
      return redirect()->back()->with('message5', 'comment deleted successfuly');
    }
}
