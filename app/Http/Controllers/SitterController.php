<?php

namespace App\Http\Controllers;

use App\Mail\Notifydemande;
use App\Models\category;
use App\Models\Demande;
use App\Models\improve;
use App\Models\sitter;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SitterController extends Controller
{
    public function sitter()
    {
        $role = 'sitter';
        $users = User::where('role', 'LIKE', '%' . $role . '%')->get();
        return view('admin.sitter', compact('users'));
    }
    public function change_role($id)
    {
        $data = User::find($id);
        $data->role = 'normale';
        $data->save();
        return redirect()->back();
    }
    public function create_request(Request $request)
    {
        $userid = Auth::user()->id;
        $demande = improve::where('user_id', $userid)->get();
        if (is_countable($demande) && count($demande) == '0') {
            if ($request->has('cin_file')) {
                $cin_file = $request->file('cin_file')->getClientOriginalName();
                $request->cin_file->move('cin_file', $cin_file);
            }
            if ($request->has('certificat')) {
                $certificat = $request->file('certificat')->getClientOriginalName();
                $request->certificat->move('certificat', $certificat);
            }
            $sitter = new improve();
            $sitter->cin = $request->cin;
            $sitter->cin_file = $cin_file;
            $sitter->certificat = $certificat;
            $sitter->user_id=$userid;
            $sitter->save();
            return redirect()->back()->with('message', 'your request is successfuly send wait patiently for the reply');
        }
        return redirect()->back()->with('message', 'your request is in progress once approved you can start working as a sitter');
    }
    public function download_cin($id)
    {
      $improve=improve::find($id);
      $filename=$improve->cin_file;
      $file_path=public_path() . "/cin_file". "/" . $filename;
      $headers=array('content_type' => 'application/pdf');
      return Response()->download($file_path ,$filename,$headers);
    }
    public function download_certificat($id)
    {
      $improve=improve::find($id);
      $filename=$improve->certificat;
      $file_path=public_path() . "/certificat". "/" . $filename;
      $headers=array('content_type' => 'application/pdf');
      return Response()->download($file_path ,$filename,$headers);
    }
    public function request()
    {
        $status = 'in progress';
        $improves = improve::where('status', 'LIKE', '%' . $status . '%')->get();
        return view('admin.request', compact('improves'));
    }
    public function demande(Request $request)
    {
        $data = $request->all();
        $data['jour'] = $request->input('jour');
        $data['task'] = $request->input('task');
        $sitter['category'] = $request->category;
        $sitter['type'] = $request->type;
        $sitter['breed'] = $request->breed;
        $sitter['sitter_id'] = $request->sitter_id;
        $sitter['user_id'] = $request->user_id;
        Demande::create($data);
    }
    public function approved_sitter($id)
    {
        $improve = improve::find($id);
        $improve->status = 'approved';
        $improve->save();
        $user_id = $improve->user_id;
        $user = user::find($user_id);
        $user->role = 'sitter';
        $user->save();
        return redirect()->back();
    }
    public function refused_sitter($id)
    {
        $improve = improve::find($id);
        $improve->status = 'refused';
        $improve->save();
        return redirect()->back();
    }
    public function approved_demande($id)
    {
        $demande = demande::find($id);
        $demande->status = 'accepted';
        $demande->save();
        $status=$demande->status;
        $user=auth()->user()->username;
        Mail::to($demande->user->email)->send(new Notifydemande( $user, $status));
        return redirect()->back();
    }
    public function refused_demande($id)
    {
        $demande = demande::find($id);
        $demande->status = 'refused';
        $demande->save();
        $status=$demande->status;
        $user=auth()->user()->username;
          Mail::to($demande->user->email)->send(new Notifydemande($user , $status));
        return redirect()->back();
    }
    public function request_demande($id)
    {
        $improve = improve::find($id);
        return view('admin.request_demande', compact('improve'));
    }

    public function create_sitter(Request $request)
    {
        $sitter = $request->all();
        $sitter['jour'] = $request->input('jour');
        $sitter['type'] = $request->input('type');
        $sitter['category'] = $request->input('category');
        $sitter['user_id'] = $request->user_id;
        sitter::create($sitter);
        return redirect()->back();
    }

    public function update_sitter(Request $request, $id)
    {
        $sitter = sitter::find($id);
        $sitter['jour'] = $request->input('jour');
        $sitter['type'] = $request->input('type');
        $sitter['category'] = $request->input('category');
        $sitter->save();
        return redirect()->back();
    }
}
