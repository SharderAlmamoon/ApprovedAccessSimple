<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAccessController;

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

Route::get('/unapproved',function(){
    return view('dashboardvgvg');
})->name('dashboardunapproved');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'accessadmin'])->name('dashboard');

Route::controller(AdminAccessController::class)->middleware(['auth', 'accessadmin'])->group(function(){
    Route::get('/approveduser/{id}','ApprovedUser')->name('approveuser');
    Route::get('/declineuser/{id}','DeclineUser')->name('declineuser');
});





require __DIR__.'/auth.php';
