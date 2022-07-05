<?php

use App\Http\Controllers\backend\v1\ArchiveController;
use App\Http\Controllers\backend\v1\DashboardController;
use App\Http\Controllers\backend\v1\EmployeeController;
use App\Http\Controllers\backend\v1\IncomingMailController;
use App\Http\Controllers\backend\v1\OutgoingMailController;
use App\Http\Controllers\backend\v1\UserController;
use App\Http\Controllers\backend\v1\ReportController;
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
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('logout', [DashboardController::class, 'logout'])->name('logout');

    Route::resource('incoming-mail', IncomingMailController::class);
    Route::resource('outgoing-mail', OutgoingMailController::class);
    Route::resource('archive', ArchiveController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('user', UserController::class);

    Route::get('/report/incoming-mail', [ReportController::class, 'incoming_mail'])->name('report.incoming-mail');
    Route::get('/report/outgoing-mail', [ReportController::class, 'outgoing_mail'])->name('report.outgoing-mail');
});

Route::get('/incoming-mail/{incoming_mail:uuid}/show', [IncomingMailController::class, 'show'])->name('incoming-mail.show');
Route::get('/outgoing-mail/{outgoing_mail:uuid}/show', [OutgoingMailController::class, 'show'])->name('outgoing-mail.show');
