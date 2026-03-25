<?php

use Illuminate\Support\Facades\Route;
use App\Models\Block;
use App\Http\Controllers\DiplomaController;

Route::get('/', [DiplomaController::class, 'index']);

Route::get('/login', [DiplomaController::class, 'getLogin']);
Route::post('/login', [DiplomaController::class, 'login']);

Route::get('/register', [DiplomaController::class, 'getRegister']);
Route::post('/register', [DiplomaController::class, 'register']);

Route::get('/add', [DiplomaController::class, 'create']);

Route::post('/add', [DiplomaController::class, 'store']);

Route::get('/create', [DiplomaController::class, 'create']);

Route::get('/transaction/create', [DiplomaController::class, 'create']);
Route::post('/transaction/create', [DiplomaController::class, 'store']);

// API Routes for transactions
Route::post('/api/transactions', [DiplomaController::class, 'storeTransaction']);
Route::get('/api/transactions', [DiplomaController::class, 'getTransactions']);
Route::get('/transaction/{hash}', [DiplomaController::class, 'showTransaction']);

Route::get('/search', [DiplomaController::class, 'search']);
Route::get('/blockchain', function () {

    $blocks = Block::all();

    return view('blockchain', compact('blocks'));
});
