<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function task()
    {
      $tasks = Task::all();
      return view('admin.task', compact('tasks'));
    }
    public function task_create(Request $request)
    {
      $task = new task();
      $task->libelle = $request->libelle;
      $task->prix = $request->prix;
      $task->user_id = $request->user_id;
      $task->save();
      return redirect()->back()->with('message', 'task created successfuly');
    }
    public function task_update(Request $request, $id)
    {
      $task = task::find($id);
      $task->libelle = $request->libelle;
      $task->prix = $request->prix;
      $task->save();
      return redirect()->back()->with('message', 'task updated successfuly');
    }
    public function task_delete($id)
    {
      $data=task::find($id);
      $data->delete();
      return redirect()->back()->with('message', 'task deleted successfuly');
    }
}
