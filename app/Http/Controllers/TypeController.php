<?php

namespace App\Http\Controllers;

use App\Models\type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
 
    public function type()
    {
      $types = type::all();
      return view('admin.type', compact('types'));
    }
    public function type_create(Request $request)
    {
      $type = new type;
      $type->libelle = $request->libelle;
      $type->save();
      return redirect()->back()->with('message', 'type created successfuly');
    }
    public function type_update(Request $request, $id)
    {
      $type = type::find($id);
      $type->libelle = $request->libelle;
      $type->save();
      return redirect()->back()->with('message', 'type updated successfuly');
    }
    public function type_delete($id)
    {
      $data=type::find($id);
      $data->delete();
      return redirect()->back()->with('message', 'type deleted successfuly');
    }


}
