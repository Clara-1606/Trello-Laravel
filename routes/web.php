<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\BoardUserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskUserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AttachmentController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('login',function(){
//     return "connection";
// })-> name('login');


Route::resource('categories', CategoryController::class)->middleware('auth');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Route::get('boards',[BoardController::class, 'index'])->middleware('auth')->name('boards.index');
// Route::get('boards/create',[BoardController::class, 'create'])->middleware('auth')->name('boards.create');
// Route::post('boards/',[BoardController::class, 'store'])->middleware('auth')->name('boards.store');
// Route::get('boards/{board}',[BoardController::class, 'show'])->middleware('auth')->name('boards.show');
// Route::get('boards/{board}/edit',[BoardController::class, 'edit'])->middleware('auth')->name('boards.edit');
// Route::put('boards/{board}',[BoardController::class, 'update'])->middleware('auth')->name('boards.update');
// Route::delete('boards/{board}',[BoardController::class, 'destroy'])->middleware('auth')->name('boards.destroy');

Route::resource('boards', BoardController::class)->middleware('auth');

Route::get('boards/{board}/boardUser/create',[BoardUserController::class, 'create'])->middleware('auth')->name('boards.boardUser.create');
Route::post('boards/{board}/boardUser',[BoardUserController::class, 'store'])->middleware('auth')->name('boards.boardUser.store');
Route::delete('boardUser/{boardUser}',[BoardUserController::class, 'destroy'])->middleware('auth')->name('boardUser.destroy');

Route::get('boards/{board}/tasks/create',[TaskController::class, 'create'])->middleware('auth')->name('boards.tasks.create');
Route::post('boards/{board}/task',[TaskController::class, 'store'])->middleware('auth')->name('boards.tasks.store');
Route::get('tasks/{task}',[TaskController::class, 'show'])->middleware('auth')->name('tasks.show');
Route::get('tasks/{task}/edit',[TaskController::class, 'edit'])->middleware('auth')->name('tasks.edit');
Route::put('tasks/{task}',[TaskController::class, 'update'])->middleware('auth')->name('tasks.update');
Route::delete('tasks/{task}',[TaskController::class, 'destroy'])->middleware('auth')->name('tasks.destroy');

Route::get('tasks/{task}/taskUser/create',[TaskUserController::class, 'create'])->middleware('auth')->name('tasks.taskUser.create');
Route::post('tasks/{task}/taskUser',[TaskUserController::class, 'store'])->middleware('auth')->name('tasks.taskUser.store');
Route::delete('taskUser/{taskUser}',[TaskUserController::class, 'destroy'])->middleware('auth')->name('taskUser.destroy');

Route::post('task/{task}/comments',[CommentController::class, 'store'])->middleware('auth')->name('tasks.comments.store');
Route::put('comments/{comment}',[CommentController::class, 'update'])->middleware('auth')->name('tasks.comments.update');
Route::delete('comments/{comment}',[CommentController::class, 'destroy'])->middleware('auth')->name('comments.destroy');

Route::post('task/{task}/attachments',[AttachmentController::class, 'store'])->middleware('auth')->name('tasks.attachments.store');
Route::put('attachments/{attachment}',[AttachmentController::class, 'update'])->middleware('auth')->name('tasks.attachments.update');
Route::delete('attachments/{attachment}',[AttachmentController::class, 'destroy'])->middleware('auth')->name('attachments.destroy');