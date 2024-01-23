<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'idea/', 'as' => 'idea.', 'middleware'=> ['auth']], function () {
    // Route::post('', [IdeaController::class, 'store'])->name('store');
    // Route::delete('{idea}', [IdeaController::class, 'destroy'])->name('destroy');
    // Route::get('{idea}', [IdeaController::class, 'show'])->name('show')->withoutMiddleware('auth');
    // Route::get('update/{idea}', [IdeaController::class, 'edit'])->name('edit');
    // Route::put('update/{idea}', [IdeaController::class, 'update'])->name('update');

    Route::post('{idea}/comments', [CommentController::class, 'store'])->name('comments.create');
});

Route::resource('idea', IdeaController::class)->except(['index', 'create','show'])->middleware(['auth']);
Route::resource('idea', IdeaController::class)->only(['show']);
Route::resource('users', UserController::class)->only(['edit', 'update','show'])->middleware('auth');


Route::post('/users/{user}/follow', [FollowController::class, 'follow'])->name('user.follow');
Route::post('/users/{user}/unfollow', [FollowController::class, 'unfollow'])->name('user.unfollow');


Route::post('/idea/{idea}/like', [LikesController::class, 'like'])->name('idea.like');
Route::post('/idea/{idea}/unlike', [LikesController::class, 'unlike'])->name('idea.unlike');

Route::get('/admin', [AdminDashboardController::class, 'index'])->middleware(['auth','can:admin']);

Route::get('/term', function () {
    return view('term');
});
// Route::get('/profile', function () {
//     return view('profile');
// });
