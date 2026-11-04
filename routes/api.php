<?php

use App\Http\Controllers\Api\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/health', function () {
    return response()->json([
        'status' => 'healthy',
        'application' => 'Anantyodya Welfare Foundation API',
        'version' => '1.0.0',
        'timestamp' => now()->toISOString(),
    ]);
});

// Contact Form & Inquiries
Route::post('/contact', [ContactController::class, 'store']);
Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/contacts/{id}', [ContactController::class, 'show']);
Route::patch('/contacts/{id}/status', [ContactController::class, 'updateStatus']);
