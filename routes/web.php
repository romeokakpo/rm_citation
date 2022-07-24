<?php

use App\Http\Controllers\CitationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MusiqueController;
use App\Http\Controllers\PatnerController;
use App\Http\Controllers\VideoController;
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

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('citations', [CitationController::class, 'index'])->name('citations');
Route::get('musiques', [MusiqueController::class, 'index'])->name('musiques');
Route::get('videos', [VideoController::class, 'index'])->name('videos');
Route::get('partenaires', [PatnerController::class, 'index'])->name('patner');
Route::get('contact', [ContactController::class, 'index'])->name('contact');