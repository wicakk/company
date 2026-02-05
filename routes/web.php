<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\dashboard\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\VisiMisiController;

Route::get('/', function () {
        return view('pages.leading.index', ['title' => 'Company']);
    })->name('company');

// landing page
Route::get('/', [HomeController::class, 'landing_thumbnails']);
Route::get('/team', [HomeController::class, 'landing_teams']);
Route::get('/contact-us', [HomeController::class, 'landing_contact']);
// Route::view('/team', 'pages.leading.layouts.index')->name('team.index');


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

    // Visi
    Route::get('visi', [VisiMisiController::class, 'visi'])->name('visi.index');
    Route::get('visi/create', [VisiMisiController::class, 'create_visi'])->name('visi.create_visi');
    Route::post('visi', [VisiMisiController::class, 'store_visi'])->name('visi.store_visi');
    Route::get('visi/{visi}/edit', [VisiMisiController::class, 'edit_visi'])->name('visi.edit_visi');
    Route::put('visi/{visi}', [VisiMisiController::class, 'update_visi'])->name('visi.update_visi');
    Route::delete('visi/{visi}', [VisiMisiController::class, 'destroy_visi'])->name('visi.destroy_visi');


    // Misi
    Route::get('misi', [VisiMisiController::class, 'misi'])->name('misi.index');
    Route::get('misi/create', [VisiMisiController::class, 'create_misi'])->name('misi.create_misi');
    Route::post('misi', [VisiMisiController::class, 'store_misi'])->name('misi.store_misi');
    Route::get('misi/{visi}/edit', [VisiMisiController::class, 'edit_misi'])->name('misi.edit_misi');
    Route::put('misi/{visi}', [VisiMisiController::class, 'update_misi'])->name('misi.update_misi');
    Route::delete('misi/{visi}', [VisiMisiController::class, 'destroy_misi'])->name('misi.destroy_misi');


    // teams
    Route::get('teams', [TeamsController::class, 'index'])->name('teams.index');
    Route::get('teams/create', [TeamsController::class, 'create'])->name('teams.create');
    Route::post('teams', [TeamsController::class, 'store'])->name('teams.store');
    Route::get('teams/{team}/edit', [TeamsController::class, 'edit'])->name('teams.edit');
    Route::put('teams/{team}', [TeamsController::class, 'update'])->name('pages.teams.update');
    Route::delete('teams/{team}', [TeamsController::class, 'destroy'])->name('teams.destroy');


    // profile
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























