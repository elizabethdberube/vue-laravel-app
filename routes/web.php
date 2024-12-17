 <?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Task;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');


Route::get('/api/tasks', function () {
    $taskDate = Task::find()->all();
    $tasks = json_encode($taskDate);
    return $tasks;
});

Route::put('/api/tasks/{id}', function (Request $request) {
      # Update the new email
      Task::whereId(auth()->task()->id)->update([
        'task' => $request->input('task')
    ]);

    return  back()->with("statusOne", "Task changed successfully!");
});
Route::post('/api/tasks/{id}', function (Request $request, $id) {
    $data = array( 'id'=>$request->input('id'),
    'id'=>$request->input('id'),
    'title'=>$request->input('title'),
    'description'=>$request->input('title'),
    'status'=>$request->input('status'),
 
);

Task::create($request->all());

    return  back()->with("statusOne", "Task created successfully!");
});

Route::delete('/api/tasks/{id}', function (Task $task) {

    $role->delete();
    
    return  back()->with("statusOne", "Task deleted successfully!");
});

