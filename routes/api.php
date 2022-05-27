<?php

use Squarepeg\Http\Controllers\SquareController;
use Illuminate\Support\Facades\Route;

Route::controller(SquareController::class)->group(function () {
    Route::get('sum_squares', 'sumSquares');
    Route::get('square_sums', 'squareSums');
    Route::get('diff_squares', 'diffSquares');
});
