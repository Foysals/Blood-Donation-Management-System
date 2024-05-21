<?php

use App\Http\Controllers\Front\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\DonorController as donor;
use App\Http\Controllers\Back\DonorController as donorBack;
use Illuminate\Http\Request;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/donors/{group}', [donor::class, 'index'])->name('donors');
Route::get('/search', [donor::class, 'search'])->name('search');
Route::post('/donor_search', [donor::class, 'donor_search'])->name('donor_search');
Route::get('/registration', [donor::class, 'registration'])->name('registration');
Route::post('/registration', [donor::class, 'be_a_donor'])->name('be_a_donor');


//backend
Auth::routes(['register'=>false]);
Route::post('/authentication', [LoginController::class, 'login'])->name('authentication');
Route::get('/profile', [LoginController::class, 'profile'])->name('profile')->middleware(['auth']);
Route::post('/update-donor-date', [LoginController::class, 'update_donor_date'])->name('update-donor-date');
Route::get('/home', [App\Http\Controllers\Back\DashboardController::class, 'index'])->name('home')->middleware(['auth']);
Route::get('/account', [donorBack::class, 'account']);
Route::get('/update', [donorBack::class, 'update']);

Route::get('/history', [donorBack::class, 'donateHistoryPage'])->name('history')->middleware(['auth']);
Route::post('/history', [donorBack::class, 'donateHistoryData'])->name('history')->middleware(['auth']);





