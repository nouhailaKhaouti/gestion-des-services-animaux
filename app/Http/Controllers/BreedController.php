<?php

namespace App\Http\Controllers;

use App\Models\breed;
use App\Models\category;
use Illuminate\Http\Request;

class BreedController extends Controller
{

        public function breed()
        {
          $breeds = breed::all();
          $categorys = category::all();
          return view('admin.breed', compact('categorys','breeds'));
        }
        public function breed_create(Request $request)
        {
          $breed = new breed();
          $breed->libelle = $request->libelle;
          $breed->category_id = $request->category_id;
          $breed->save();
          return redirect()->back()->with('message', 'breed created successfuly');
        }
        public function breed_update(Request $request, $id)
        {
          $breed = breed::find($id);
          $breed->libelle = $request->libelle;
          $breed->category_id = $request->category_id;
          $breed->save();
          return redirect()->back()->with('message', 'breed updated successfuly');
        }
        public function breed_delete($id)
        {
          $data=breed::find($id);
          $data->delete();
          return redirect()->back()->with('message', 'breed deleted successfuly');
        }
    
}
