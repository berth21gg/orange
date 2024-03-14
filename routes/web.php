<?php

use App\Http\Controllers\OrangeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [OrangeController::class,'index'])->name('home');
Route::get('/blog', [OrangeController::class,'blog'])->name("blog");
Route::get('/detail_post/{id_post}', [OrangeController::class, 'detail_post'])->name("detail_post");
Route::post('/detail_post/{post_id}/comment', [OrangeController::class,"addComment"])->name("addComment");
