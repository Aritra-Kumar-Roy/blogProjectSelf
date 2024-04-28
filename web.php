<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\homeController;
use App\Http\Controllers\adminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get ('/',[homeController::class,'homepage']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home',[homeController::class,'index'])->middleware('auth')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get ('/admin.post_page',[adminController::class,'post_page']);

Route::post ('/add_post',[adminController::class,'add_post']);

Route::get ('/show_post',[adminController::class,'show_post']);

Route::get ('/delete_post/{id}',[adminController::class,'delete_post']);

Route::get ('/edit_post/{id}',[adminController::class,'edit_post']);

Route::post ('/update_post/{id}',[adminController::class,'update_post']);

Route::get ('/post_details/{id}',[homeController::class,'post_details']);

Route::get ('/create_post',[homeController::class,'create_post'])->middleware('auth');

Route::post ('/user_post',[homeController::class,'user_post']);


Route::get ('/my_post',[homeController::class,'my_post'])->middleware('auth');

Route::get ('/my_post_delete/{id}',[homeController::class,'my_post_delete'])->middleware('auth');


Route::get ('/my_post_update/{id}',[homeController::class,'my_post_update'])->middleware('auth');

Route::post ('/update_post_data/{id}',[homeController::class,'update_post_data'])->middleware('auth');;

Route::get ('/accept_post/{id}',[adminController::class,'accept_post']);

Route::get ('/reject_post/{id}',[adminController::class,'reject_post']);









