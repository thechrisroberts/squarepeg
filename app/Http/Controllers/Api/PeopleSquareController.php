<?php

namespace Squarepeg\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Squarepeg\Actions\SquareSumsPeopleAction;
use Squarepeg\Actions\SumSquaresPeopleAction;
use Squarepeg\Http\Requests\PeopleSquareRequest;
use Squarepeg\Models\Occurrence;

class PeopleSquareController extends Controller
{
    public function sumSquares(PeopleSquareRequest $request)
    {
        $occurrence = Occurrence::firstOrNew([
            'limit' => $request->people,
            'type' => SumSquaresPeopleAction::class,
        ], [ 'occurrences' => 0 ]);

        $occurrence->occurrences++;
        $occurrence->save();

        $value = (new SumSquaresPeopleAction($request->people))->handle();

        return $this->payload($request->people, $value, SumSquaresPeopleAction::class);
    }

    public function squareSums(PeopleSquareRequest $request)
    {
        $occurrence = Occurrence::firstOrNew([
            'limit' => $request->people,
            'type' => SquareSumsPeopleAction::class,
        ], [ 'occurrences' => 0 ]);

        $occurrence->occurrences++;
        $occurrence->save();

        $value = (new SquareSumsPeopleAction($request->people))->handle();

        return $this->payload($request->people, $value, SquareSumsPeopleAction::class);
    }

    private function payload(string $people, string $value, string $squareClass): array
    {
        return [
            'datetime' => now(),
            'value' => $value,
            'number' => $people,
            'occurrences' => Occurrence::where('limit', $people)->sum('occurrences'),
            'type' => $squareClass,
            'occurrences_of_type' => Occurrence::where([
                'limit' => $people,
                'type' => $squareClass,
            ])->first()->occurrences,
        ];
    }
}
