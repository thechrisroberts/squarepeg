<?php

namespace Squarepeg\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Squarepeg\Actions\DiffSquaresAction;
use Squarepeg\Actions\SquareSumsAction;
use Squarepeg\Actions\SumSquaresAction;
use Squarepeg\Http\Requests\SquareSumsRequest;
use Squarepeg\Http\Requests\SumSquaresRequest;
use Squarepeg\Models\Occurrence;

class SquareController extends Controller
{
    public function sumSquares(SumSquaresRequest $request)
    {
        return $this->handleSquares(
            (int) $request->get('limit'),
            SumSquaresAction::class
        );
    }

    public function squareSums(SquareSumsRequest $request)
    {
        return $this->handleSquares(
            (int) $request->get('limit'),
            SquareSumsAction::class
        );
    }

    public function diffSquares(SquareSumsRequest $request)
    {
        return $this->handleSquares(
            (int) $request->get('limit'),
            DiffSquaresAction::class
        );
    }

    private function handleSquares(int $limit, string $squareClass, int $power = 2)
    {
        // Retrieve or new up an Occurrence instance with the current
        // limit and action
        $occurrence = Occurrence::firstOrNew([
            'param' => $limit,
            'type' => $squareClass,
        ], [ 'occurrences' => 0 ]);

        // Increment occurrences for this limit/type
        $occurrence->occurrences++;
        $occurrence->save();

        // Assemble the data in a standard payload and return it as a json object
        return response()->json($this->payload(
            $limit,
            // All relevant Square action classes should conform to the SquaresAction abstract class,
            // allowing polymorphic interaction
            (new $squareClass($limit, $power))->handle(),
            $squareClass
        ));
    }

    private function payload(int $limit, int $value, string $squareClass): array
    {
        return [
            'datetime' => now(),
            'value' => $value,
            'number' => $limit,
            'occurrences' => Occurrence::where('param', $limit)->sum('occurrences'),
            'type' => $squareClass,
            'occurrences_of_type' => Occurrence::where([
                'param' => $limit,
                'type' => $squareClass,
            ])->first()->occurrences,
        ];
    }
}
