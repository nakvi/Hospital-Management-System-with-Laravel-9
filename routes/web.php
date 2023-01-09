<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Artisan;
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
Route::get('/index',[HomeController::class,'redirect'])->middleware('auth','verified');
Route::post('/addDoctor',[AdminController::class,'addDoctor']);
Route::get('/viewDoctor',[AdminController::class,'viewDoctor']);
Route::get('/viewAppointment',[AdminController::class,'viewAppointment']);
Route::get('/approved_appointment/{id}',[AdminController::class,'approved_appointment']);
Route::get('/disapproved_appointment/{id}',[AdminController::class,'disapproved_appointment']);
Route::get('/trashDoctor',[AdminController::class,'trashDoctor']);
Route::get('/restoreDoctor/{id}',[AdminController::class,'restoreDoctor']);
Route::get('/forceDeleteDoctor/{id}',[AdminController::class,'forceDeleteDoctor']);
Route::get('/deleteDoctor/{id}',[AdminController::class,'deleteDoctor']);
Route::get('/updateDoctor/{id}',[AdminController::class,'updateDoctor']);
Route::post('/editDoctor/{id}',[AdminController::class,'editDoctor']);
Route::get('/ViewEmail/{id}',[AdminController::class,'viewEmail']);
Route::post('/sendEmail/{id}',[AdminController::class,'sendEmail']);
Route::post('/appointment',[HomeController::class,'appointment']);
Route::get('/myappointment',[HomeController::class,'myappointment']);
Route::get('/cancel_appointment/{id}',[HomeController::class,'cancel_appointment']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//For Route Clear
Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('optimize');
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "Cleared!";

 });