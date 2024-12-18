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
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tasks(Request $request)
    {
 
      $taskData = Task::paginate(4); 
         
      return response($taskData, 200) ->header('Content-Type', 'application/json');
        
    }

    public function create(Request $request)
    {

        $data = array( 
        'title'=>$request->input('title'),
        'description'=>$request->input('description'),
        'status'=>$request->input('status'),
     
    );
    Task::create($request->all());

        return  response( "Task created successfully!", 200);
        
    }

    public function update(Request $request, $id)
    {
   
        Task::whereId($id)->update([
        'title'=>$request->input('title'),
        'description'=>$request->input('description'),
        'status'=>$request->input('status'),
        ]);
    
        return  response( "Task updated successfully!", 200);
        
    }

    public function delete(Request $request, $id)
    {
        $task = Task::find($id);
        $task->delete();
    
        return response( "Task deleted successfully!", 200);
        
    }
}
