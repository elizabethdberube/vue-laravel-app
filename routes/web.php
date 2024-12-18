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


Auth::routes();


Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
 });



Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');
