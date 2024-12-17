 <?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\TasksController;


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

Route::get('/api/tasks', [App\Http\Controllers\TasksController::class, 'tasks'])->name('tasks');

Route::post('/api/tasks/{id}', [App\Http\Controllers\TasksController::class, 'create'])->name('create');

Route::put('/api/tasks/{id}', [App\Http\Controllers\TasksController::class, 'update'])->name('update');

Route::delete('/api/tasks/{id}', [App\Http\Controllers\TasksController::class, 'delete'])->name('delete');