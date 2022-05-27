<?php

namespace Squarepeg\Http\Controllers;

use Illuminate\Routing\Controller;
use Squarepeg\Actions\SumSquaresAction;
use Squarepeg\Http\Requests\SquareSumsRequest;
use Squarepeg\Http\Requests\SumSquaresRequest;

class SquareController extends Controller
{
    public function sumSquares(SumSquaresRequest $request)
    {
        (new SumSquaresAction((int) $request->get('limit')))->handle();
    }

    public function squareSums(SquareSumsRequest $request)
    {
        //
    }
}
