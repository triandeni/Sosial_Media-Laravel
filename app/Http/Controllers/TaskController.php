<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index (Task $task) 
    {
        return view('task.index', [
            "title" => "task",
            'active'=> 'task',
            'tasks' => new $task,
            'task' => Task::orderBy('id', 'desc')->get()
            
        ]);
    }
    public function store ( TaskRequest $request)
    {
       
        Task::create(['list' => $request->list,]);
        

        return back();
    }

    public function edit(Task $task)
    {
        
        return view('task.edit', [
            'title' => 'edit task',
            "active" => 'task',
            'tasks' => $task
        ]);
    }
    public function update (TaskRequest $request, $id)
    {
        Task::where('id', $id)->update(['list' => $request->list ]);

        return redirect('task');
    }

    public function destroy ($id)
    {
         Task::where('id', $id)->delete();
        
         return back();
    }
}
