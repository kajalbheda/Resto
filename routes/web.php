<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/",[HomeController::class,"index"]);
Route::get("redirects",[HomeController::class,"redirects"]);
Route::get("redirects",[HomeController::class,"redirects"]);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get("/users",[AdminController::class,"user"]);
Route::get("/users_trash",[AdminController::class,"userTrash"]);
Route::get("/restoreuser/{id}",[AdminController::class,"restoreUser"]);
Route::get("/deleteusers/{id}",[AdminController::class,"deleteUsers"]);
Route::get("/forcedeleteusers/{id}",[AdminController::class,"forceDeleteUsers"]);

Route::get("/foodmenu",[AdminController::class,"foodMenu"]);
Route::get("/addfoodmenu",[AdminController::class,"addfoodMenu"]);
Route::post("/uploadmenu",[AdminController::class,"uploadMenu"]);
Route::get("/deletefoods/{id}",[AdminController::class,"deleteFoods"]);
Route::get("/editfoods/{id}",[AdminController::class,"editfoodmenu"]);
Route::post("/updatefood",[AdminController::class,"updateFoodmenu"]);

Route::post("/reservation",[AdminController::class,"Reservation"]);
Route::get("/viewreservations",[AdminController::class,"viewReservations"]);

Route::get("/adminchef",[AdminController::class,"adminChef"]);
Route::get("/addchef",[AdminController::class,"addchef"]);
Route::post("/insertchef",[AdminController::class,"insertChef"]);
Route::get("/editchef/{id}",[AdminController::class,"editchef"]);
Route::post("/updatechef",[AdminController::class,"updateChef"]);
Route::get("/deletechef/{id}",[AdminController::class,"deleteChef"]);

Route::post("/addcart/{id}",[HomeController::class,"addCart"]);
Route::get("/showcart/{id}",[HomeController::class,"showCart"]);
Route::get("/removecart/{id}",[HomeController::class,"removeCart"]);

Route::post("/orderconfirm",[HomeController::class,"orderConfirm"]);
Route::get("/orders",[AdminController::class,"Orders"]);
Route::get("/searchorder",[AdminController::class,"searchOrder"]);


