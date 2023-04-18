<?php

namespace App\Http\Controllers;

use App\Models\breed;
use App\Models\category;
use App\Models\Demande;
use App\Models\Review;
use App\Models\Task;
use App\Models\type;
use App\Models\sitter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class ProfileController extends Controller
{
    public function profile()
    {
      if (Auth::user()->role=='normale') {
  
        //this two ligns mean that appointements will be displyed only if the user_id and $userid match
        $userid = Auth::user()->id;
        $profile = user::find($userid);
        $requests=Demande::where('user_id', 'LIKE', '%' . $userid . '%')->get();
        return view('user.profile', compact('profile','requests'));
      } else {
        $userid = Auth::user()->id;
        $profile = user::find($userid);
        $categorys= category::all();
        $breeds= breed::all();
        $types=type::all();
        $review = Review::where('sitter_id',$userid)->avg('rating');
        $user_nembre=review::where('sitter_id',$userid)->count('user_id');
        $sitter=sitter::where('user_id', 'LIKE', '%' . $userid . '%')->get();
        $tasks=Task::where('user_id', $userid)->get();
        $demandes=Demande::where('sitter_id', $userid)->get();
        return view('user.profile', compact('profile','types','categorys','tasks','breeds','sitter','review','user_nembre','demandes'));
      }
    }
    public function user_profile($id)
    {
     $profile=user::find($id);
     $breeds= breed::all();
     $review = Review::where('sitter_id',$id)->avg('rating');
     $user_nembre=review::where('sitter_id',$id)->count();
     $sitter=sitter::where('user_id', 'LIKE', '%' . $id . '%')->first();
     $tasks=Task::where('user_id', 'LIKE', '%' . $id . '%')->get();
     return view('user.profile', compact('profile','tasks','sitter','breeds','review','user_nembre'));
    }
    public function update($id)
    {
      $profile = user::find($id);
      return view('user.update_profile', compact('profile'));
    }
    public function editprofile(Request $request, $id)
    {
      $profile = User::find($id);
      $image = $request->image;
      if ($image) {
        //we create a new name for the image 
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        //and after we move it to an other file called doctorimage that will be created automaticly ones we upload the image 
        $request->image->move('profileimage', $imagename);
        $profile->image = $imagename;
      }
      $profile->username = $request->username;
      $profile->firstname = $request->firstname;
      $profile->lastname = $request->lastname;
      $profile->email = $request->email;
      $profile->address = $request->address;
      $profile->city = $request->city;
      $profile->country = $request->country;
      $profile->postal_code = $request->postal_code;
      $profile->phone = $request->phone;
      $profile->about_you = $request->about_you;
      $profile->age = $request->age;
      $profile->save();
      return redirect()->back()->with('message', 'profile updated successfuly');
    }
    public function reviewstore(Request $request){
      $id=Auth::user()->id;
    if (Review::where('user_id',$id)->exists())
    {

      $review=review::where('user_id',$id)->get();
      $review->user_id = $request->user_id;
      $review->sitter_id = $request->sitter_id;
      $review->rating = $request->rating;
      $review->save();
      return redirect()->back()->with('flash_msg_success','Your review has been updated Successfully,');
    }else
    {
    $review = new Review();
      $review->user_id = $request->user_id;
      $review->sitter_id = $request->sitter_id;
      $review->rating = $request->rating;
      $review->save();
      return redirect()->back()->with('flash_msg_success','Your review has been submitted Successfully,');
    }
     
  }
}
