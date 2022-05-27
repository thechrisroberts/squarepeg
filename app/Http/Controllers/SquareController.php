<?php

namespace Squarepeg\Http\Controllers;

use Illuminate\Routing\Controller;
use Squarepeg\Actions\DiffSquaresAction;
use Squarepeg\Actions\SquareSumsAction;
use Squarepeg\Actions\SumSquaresAction;
use Squarepeg\Http\Requests\SquareSumsRequest;
use Squarepeg\Http\Requests\SumSquaresRequest;

class SquareController extends Controller
{
    public function sumSquares(SumSquaresRequest $request)
    {
        $val = (new SumSquaresAction((int) $request->get('limit')))->handle();

        return response()->json([
            'value' => $val,
        ]);
    }

    public function squareSums(SquareSumsRequest $request)
    {
        $val = (new SquareSumsAction((int) $request->get('limit')))->handle();

        return response()->json([
            'value' => $val,
        ]);
    }

    public function diffSquares(SquareSumsRequest $request)
    {
        $val = (new DiffSquaresAction((int) $request->get('limit')))->handle();

        return response()->json([
            'value' => $val,
        ]);
    }
}
