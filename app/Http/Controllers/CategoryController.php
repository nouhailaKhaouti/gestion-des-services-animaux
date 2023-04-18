<?php

namespace App\Http\Controllers;

use App\Models\breed;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function category()
    {
      $categorys = category::all();
      return view('admin.category', compact('categorys'));
    }
    public function category_create(Request $request)
    {
      $category = new category;
      $category->libelle = $request->libelle;
      $category->save();
      return redirect()->back()->with('message', 'category created successfuly');
    }
    public function category_update(Request $request, $id)
    {
      $category = category::find($id);
      $category->libelle = $request->libelle;
      $category->save();
      return redirect()->back()->with('message', 'category updated successfuly');
    }
    public function category_delete($id)
    {
      $data=category::find($id);
      $data->delete();
      return redirect()->back()->with('message', 'category deleted successfuly');
    }
    public function myformAjax($id)
    {
        $breeds = DB::table("breed")
                    ->where("category_id",$id)
                    ->lists("libelle","id");
        return json_encode($breeds);
    }
}
