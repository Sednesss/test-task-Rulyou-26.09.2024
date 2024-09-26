<?php

use App\Http\Controllers\API\V1\User\CreateController as UserCreateController;
use App\Http\Controllers\API\V1\User\DestroyController as UserDestroyController;
use App\Http\Controllers\API\V1\User\ShowController as UserShowController;
use App\Http\Controllers\API\V1\User\UpdateController as UserUpdateController;
use Illuminate\Support\Facades\Route;

Route::as('v1::')->group(function () {
    Route::withoutMiddleware(['auth:api'])->group(function () {
        Route::as('users::')->group(function () {
            Route::get('/get', UserShowController::class)->name('list');
            Route::post('/create', UserCreateController::class)->name('list');
            Route::patch('/update/{id}', UserUpdateController::class)->name('list');
            Route::delete('/delete/{id}', UserDestroyController::class)->name('destroy');
        });
    });
});
