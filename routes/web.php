<!-- <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;

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



Route::get('/', [App\Http\Controllers\WelcomeController::class, 'welcome'])->name('welcome');


// Route::get('/about', [App\Http\Controllers\AboutController::class, 'about'])->name('about');
// Auth::routes();


// Route::group(['middleware' => ['auth']], function() {
//     /**
//     * Logout Route
//     */
//     Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
//  });



// Route::group(['middleware' => ['auth', 'permission']], function() {


// });

/**
 * User Routes
 */
// Route::group(['prefix' => 'roles'], function() {

// });

// Route::group(['prefix' => 'permissions'], function() {

// });

// Route::resource('roles', RolesController::class);
// Route::resource('permissions', PermissionsController::class);


