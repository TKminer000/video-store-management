<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\TapeController;
use App\Http\Controllers\ShelfController;
use App\Http\Controllers\UserController;

Route::get('/', fn() => redirect()->route('login'));
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth.session')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::resource('movies', MovieController::class);
    Route::resource('actors', ActorController::class);
    Route::resource('tapes', TapeController::class);
    Route::resource('shelves', ShelfController::class);
    Route::resource('users', UserController::class);

    Route::get('/audit-logs', function() {
    $logs = DB::table('audit_logs')
        ->join('users', 'audit_logs.user_id', '=', 'users.id')
        ->select('audit_logs.*', 'users.username')
        ->orderByDesc('audit_logs.created_at')
        ->get();
    return view('audit_logs', compact('logs'));
})->name('audit-logs');

});