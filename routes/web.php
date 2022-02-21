<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\LogoutController;
use App\Models\Category;
use App\Models\Event;
use App\Models\Zone;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    // $destacados = Event()
   
    $destacados  = Event::orderBy('created_At','DESC')->limit(4)->get();

    $events = Event::all();
    $categorias = Category::all();
    $zonas = Zone::all();
    // return view('recipe.index',['categories' => $categories,'recipes' =>$recipes]);
    // ['events'=>$events,'categories'=>$categorias,'zones'=>$zonas]
    return view('eventos.index',['categories' => $categorias,'events'=>$events,'zones'=>$zonas, 'destacados'=>$destacados]);
 
});
Route::resource('booking', BookingController::class);
Route::resource('category', CategoryController::class);
// Route::resource('user', UserController::class);
Route::resource('event', EventController::class);
Route::resource('user',UserController::class);
Route::resource('zone',ZoneController::class);
Route::resource('opinion',OpinionController::class);
//esta aqui No encuentra nose porque
Route::resource('admin',AdminController::class);

// Route::resource('/logout', LogoutController::class);

//deslogearse loko
// Route::group(['middleware' => ['auth']], function() {
//     /**
//     * Logout Route
//     */
//     Route::get('/logout', LogoutController::class)->name('logout.perform');
//  });


// Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
//     // $destacados = Event()
   
//     $destacados  = Event::orderBy('created_At','DESC')->limit(4)->get();

//     $events = Event::all();
//     $categorias = Category::all();
//     $zonas = Zone::all();
//     // return view('recipe.index',['categories' => $categories,'recipes' =>$recipes]);
//     // ['events'=>$events,'categories'=>$categorias,'zones'=>$zonas]
//     return view('eventos.index',['categories' => $categorias,'events'=>$events,'zones'=>$zonas, 'destacados'=>$destacados]);
 
// });
// Route::get('/cookie-consent', CookieConsentController::class)->name('cookieConsent');

Route::post('logout',[LogoutController::class,'destroy']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');