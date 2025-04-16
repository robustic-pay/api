<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomersController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/tokens/create/{id}', function (Request $request, int $id) {
    $user = User::find($id);
    $token = $user->createToken($user->created_at);
    return [
        "user" => $user,
        'token' => $token->plainTextToken
    ];
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('{store}')->group(function () {{
        Route::resource('product', ProductController::class);
        Route::resource('customers', CustomersController::class);
        Route::resource('payment', PaymentController::class);
    }});
    Route::resource('store', StoreController::class);
});
