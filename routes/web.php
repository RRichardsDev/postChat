<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Conversations\ConversationController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/account/profile', [AccountController::class, 'index'])->name('accountProfile');
Route::get('/account/edit', [AccountController::class, 'editIndex'])->name('accountEdit');
Route::post('/account/edit', [AccountController::class, 'update'])->name('accountUpdate');

Route::get('/conversations', [ConversationController::class, 'index'])->name('conversations.index');
Route::get('/conversations/create', [ConversationController::class, 'create'])->name('conversations.create');
Route::get('/conversations/{conversation}', [ConversationController::class, 'show'])->name('conversations.show');
Route::post('/conversations/{message}', [ConversationController::class, 'reply'])->name('conversations.reply');
Route::post('/conversations/{user}', [ConversationController::class, 'addUser'])->name('conversations.addUser');

