<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tasks(Request $request)
    {
 
      $taskData = Task::find()->all(); 
      $tasks = json_encode($taskData); 
      
   
      return response($tasks, 200) ->header('Content-Type', 'application/json');
        
    }

    public function create(Request $request)
    {

        Task::whereId(auth()->task()->id)->update([
            'task' => $request->input('task')
        ]);
    
        return  back()->with("statusOne", "Task changed successfully!");
        
    }

    public function update(Request $request)
    {

        Task::whereId(auth()->task()->id)->update([
            'task' => $request->input('task')
        ]);
    
        return  back()->with("statusOne", "Task changed successfully!");
        
    }

    public function delete(Task $task)
    {

        $task->delete();
    
        return  back()->with("statusOne", "Task deleted successfully!");
        
    }
}
