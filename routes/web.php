<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\dashboard\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\VisiMisiController;

Route::get('/', function () {
        return view('pages.leading.index', ['title' => 'Company']);
    })->name('company');

// landing page
Route::get('/', [HomeController::class, 'landing_thumbnails']);


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('pages.dashboard.ecommerce', ['title' => 'Company Dashboard']);
    })->name('dashboard');

    Route::get('/profile', function () {
        return view('pages.profile', ['title' => 'Profile']);
    })->name('profile');

    Route::get('/blank', function () {
        return view('pages.blank', ['title' => 'Blank']);
    })->name('blank');

    Route::get('/error-404', function () {
        return view('pages.errors.error-404', ['title' => 'Error 404']);
    })->name('error-404');

    Route::get('/home', function () {
        return view('pages.home.index', ['title' => 'home']);
    })->name('home');

    // Home / thumbnails
    Route::get('home', [HomeController::class, 'index'])->name('home.index');
    Route::get('home/create', [HomeController::class, 'create'])->name('home.create');
    Route::post('home', [HomeController::class, 'store'])->name('home.store');
    Route::get('home/{home}/edit', [HomeController::class, 'edit'])->name('home.edit');
    Route::put('home/{home}', [HomeController::class, 'update'])->name('home.update');
    Route::delete('home/{home}', [HomeController::class, 'destroy'])->name('home.destroy');

    // Client
    Route::get('client', [ClientController::class, 'index'])->name('client.index');
    Route::get('client/create', [ClientController::class, 'create'])->name('client.create');
    Route::post('client', [ClientController::class, 'store'])->name('client.store');
    Route::get('client/{client}/edit', [ClientController::class, 'edit'])->name('client.edit');
    Route::put('client/{client}', [ClientController::class, 'update'])->name('client.update');
    Route::delete('client/{client}', [ClientController::class, 'destroy'])->name('client.destroy');

    // Service
    Route::get('service', [ServiceController::class, 'index'])->name('service.index');
    Route::get('service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('service', [ServiceController::class, 'store'])->name('service.store');
    Route::get('service/{service}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('service/{service}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('service/{service}', [ServiceController::class, 'destroy'])->name('service.destroy');

    Route::get('/profile', [ProfileController::class, 'index'])->name('pages.profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('pages.profile.update');

});



// authentication pages
Route::get('/signin', [UserController::class, 'signin'])->name('signin');
Route::post('/signin', [UserController::class, 'postsignin'])->name('postsignin');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::fallback(function () {
    return response()->view('pages.errors.error-404', [], 404);
});
// Route::get('/signin', function () {
//     return view('pages.auth.signin', ['title' => 'Sign In']);
// })->name('signin');

// Route::post('/postsignin', function () {
//     return view('pages.auth.signin', ['title' => 'Sign In']);
// })->name('postsignin');

// Route::get('/signup', function () {
//     return view('pages.auth.signup', ['title' => 'Sign Up']);
// })->name('signup');























