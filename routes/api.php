<?php

use Illuminate\Support\Facades\Route;
use Squarepeg\Http\Controllers\Api\SquareController;

Route::controller(SquareController::class)->group(function () {
    Route::get('sum_squares', 'sumSquares');
    Route::get('square_sums', 'squareSums');
    Route::get('diff_squares', 'diffSquares');
});
