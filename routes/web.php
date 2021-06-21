<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);


Route::group(['middleware' => 'auth'], function () {
 
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    //Book
    Route::prefix('/book')->group(function() {
        Route::get('/', [BookController::class, 'index'])->name('book');
        Route::get('/add', [BookController::class, 'create']);
        Route::post('/', [BookController::class, 'store']);
        Route::get('/edit/{id}', [BookController::class, 'edit']);
        Route::put('/{id}', [BookController::class, 'update']);
        Route::get('/delete/{id}', [BookController::class, 'destroy']);
    });
 
});




// Route::get('/', function () {
//     return view('login');
// });

// Route::post('/login', [UserController::class, 'login']);

// Route::get('/home', function () {
//     return view('home', ['nama' => 'Administrator',
//     'jabatan' => 'admin']);
// });

// Route::get('/greeting', function () {
//     return 'Vina Alvionita';
// });

// Route::prefix('/admin')->group(function(){
//     Route::get('/users', function () {
//         return 'halaman user';
//     });

//     Route::get('/admins', function () {
//         return 'halaman admins';
//     });
// });

// Route::get('/users/{id}', function ($id) {
//     return 'Selamat datang '.$id;
// });

// Route::get('/post/{post}/comment/{comment}', function ($postId, $commantId) {
//     return 'ada di post '.$postId.' komen di '.$commantId;
// });

// Route::get('/user/{name}', function ($name) {
//     return 'Nama saya '.$name;
// })->where('name', '[A-Za-z \']{3,}');