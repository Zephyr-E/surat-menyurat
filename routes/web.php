<?php

use App\Http\Controllers\backend\v1\ArchiveController;
use App\Http\Controllers\backend\v1\DashboardController;
use App\Http\Controllers\backend\v1\IncomingMailController;
use App\Http\Controllers\backend\v1\LogoutController;
use App\Http\Controllers\backend\v1\OutgoingMailController;
use App\Http\Controllers\backend\v1\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::group(["middleware" => [
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
]], function () {
    Route::get('/', [DashboardController::class, "index"])->name('dashboard');
    Route::resource('incoming-mail', IncomingMailController::class);
    Route::resource('outgoing-mail', OutgoingMailController::class);
    Route::resource('archive', ArchiveController::class);
    Route::resource('user', UserController::class);
    Route::get('/logout', [LogoutController::class, "logout"])->name('logout');
});
