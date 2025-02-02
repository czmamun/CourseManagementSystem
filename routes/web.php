<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/', function () {
    return redirect()->route('login'); // Redirect to login page for unauthenticated users
})->name('home');


// Dashboard Routes
Route::get('/dashboard/student', function () {
    return view('dashboard.student');
})->middleware('auth')->name('dashboard.student');

Route::get('/dashboard/parent', function () {
    return view('dashboard.parent');
})->middleware('auth')->name('dashboard.parent');

// Course Registration Route
Route::post('/courses/register', [CourseController::class, 'register'])->name('courses.register');

// Other routes...
Route::resource('parents', ParentsController::class);
