<?php

use App\Http\Controllers\GiftController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UtilController::class, 'loadWelcome'])->name('welcome');

Route::get('/hello/{message}', [UtilController::class, 'helloMessage']);

// rota de homepage
Route::get('/home', [UtilController::class, 'loadHomepage'])->name('home');



//******************************************** */
// rotas de users
//******************************************** */

Route::get('/users', [UserController::class, 'allUsers']) ->name('users.all');

// rota de adicionar utilizadores
Route::get('/users-add', [UserController::class, 'AddUsers'])->name('users.add');

// rota de registar users no servidor
Route::post('/store-users', [UserController::class, 'storeUser'])->name('users.store');

// rota de apagar users
Route::get('/delete-users/{id}',[UserController::class, 'deleteUsers'] )->name('users.delete');

// rota de ver ou editar users
Route::get('/edit-users/{id}',[UserController::class, 'editUsers'] )->name('users.edit')->middleware('auth');

// rota de registar o edit no servidor
Route::put('/update-users', [UserController::class, 'updateUser'])->name('users.update');


//******************************************** */
// rotas de tasks
//******************************************** */

Route::get('/tasks', [TaskController::class, 'allTasks']) ->name('tasks.all');

// rota de adicionar tarefas
Route::get('/tasks-add', [TaskController::class, 'addTasks'])->name('tasks.add');

// rota de registar users no servidos
Route::post('/store-tasks', [TaskController::class, 'storeTask'])->name('tasks.store');

// rota para apagar tarefas
Route::get('/delete-tasks/{id}', [TaskController::class, 'deleteTasks'] )->name('tasks.delete');

// rota de ver ou editar tasks
Route::get('/edit-tasks/{id}',[TaskController::class, 'editTasks'] )->name('tasks.edit');

//******************************************** */
// rotas do presente de natal
//******************************************** */
Route::get('/gifts', [GiftController::class, 'allGifts']) ->name('gifts.all');

// rota de adicionar presente
Route::get('/gifts-add', [GiftController::class, 'addGifts'])->name('gifts.add');

// rota de registar presente no servidos
Route::post('/store-gifts', [GiftController::class, 'storeGift'])->name('gifts.store');

// rota para apagar presente
Route::get('/delete-gifts/{id}', [GiftController::class, 'deleteGifts'] )->name('gifts.delete');

// rota de ver ou editar presente
Route::get('/edit-gifts/{id}',[GiftController::class, 'editGifts'] )->name('gifts.edit');


// rota de registar o edit no servidor
Route::put('/update-gifts', [GiftController::class, 'updateGift'])->name('gifts.update');

//******************************************** */
// rota fallback
//******************************************** */

Route::fallback([UtilController::class, 'loadFallback']);
