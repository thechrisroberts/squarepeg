<?php

use Illuminate\Support\Facades\Route;
use Squarepeg\Http\Controllers\Api\SquareController;
use Squarepeg\Http\Controllers\Api\PeopleSquareController;
use Squarepeg\Http\Controllers\Api\MathnetController;

Route::controller(SquareController::class)->group(function () {
    Route::get('sum_squares', 'sumSquares');
    Route::get('square_sums', 'squareSums');
    Route::get('diff_squares', 'diffSquares');
});

Route::controller(PeopleSquareController::class)->group(function () {
    Route::get('sum_people_squares', 'sumSquares');
    Route::get('square_people_sums', 'squareSums');
});

Route::controller(MathnetController::class)->prefix('math')->group(function () {
    Route::get('{action}', 'execute');
});
