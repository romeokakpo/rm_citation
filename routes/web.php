<?php

use App\Http\Controllers\CitationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MusiqueController;
use App\Http\Controllers\PatnerController;
use App\Http\Controllers\VideoController;
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

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::post('/', [IndexController::class, 'newsletter'])->name('home.post');

Route::get('mes-citations/{n?}', [CitationController::class, 'index_public'])->name('citations');
Route::post('mes-citations/{n?}', [IndexController::class, 'newsletter'])->name('citations.post');

Route::get('mes-musiques', [MusiqueController::class, 'index_public'])->name('musiques');
Route::post('mes-musiques', [IndexController::class, 'newsletter'])->name('musiques.post');

Route::get('mes-videos', [VideoController::class, 'index_public'])->name('videos');
Route::post('mes-videos', [IndexController::class, 'newsletter'])->name('videos.post');

Route::get('mes-partenaires', [PatnerController::class, 'index_public'])->name('patner');
Route::post('mes-partenaires', [IndexController::class, 'newsletter'])->name('patner.post');

Route::get('me-contacter', [ContactController::class, 'index'])->name('contact');
Route::post('me-contacter', [ContactController::class, 'messages'])->name('contact.post');

Route::post('download/citation', [CitationController::class, 'download'])->name('download');

/**Login mode */
Route::get('/admin/login', function () {
  if (session()->has('ADMIN'))
    return redirect()->route('admin.home');
  return view('admin.login');
})->name('admin.login');

Route::post('/login', [AdminController::class, 'login'])->name('admin.post.login');

/**End Login */

Route::group(['middleware' => ['admin_auth']], function () {
  Route::prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.home');

    Route::resource('/citations', CitationController::class);
    Route::post('/delete/citation', [CitationController::class, 'delete_quote'])->name('citation.del');
    Route::resource('videos', VideoController::class);
    Route::post('/delete/video', [VideoController::class, 'delete_video'])->name('video.del');
    Route::resource('partenaires', PatnerController::class);
    Route::resource('musiques', MusiqueController::class);

    Route::get('/newsletters', [AdminController::class, 'newsletters'])->name('newsletters.list');
    Route::post('/newsletters/del', [AdminController::class, 'newsletters_del'])->name('newsletter.del');
    Route::get('/notifications', [AdminController::class, 'notifications'])->name('notifications.all');
    Route::get('/messages/all', [AdminController::class, 'read_all'])->name('inbox.all');
    Route::post('message/read', [AdminController::class, 'read_one'])->name('inbox.one');
    Route::post('message/del', [AdminController::class, 'del_one'])->name('inbox.del');
    Route::get('/profile', [AdminController::class, 'profil'])->name('profile');
    Route::post('/profil', [AdminController::class, 'password'])->name('password');
  });
});


Route::get('admin/logout', [AdminController::class, 'logout'])->name('logout');
