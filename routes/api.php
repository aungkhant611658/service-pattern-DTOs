<?php

use App\Http\Controllers\Api\V1\BlogPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware(['auth:sanctum'])->group([

// ]);

Route::get('/get-posts', [BlogPostController::class, 'index']);
Route::post('/create-posts', [BlogPostController::class, 'store']);
