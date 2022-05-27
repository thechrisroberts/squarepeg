<?php

namespace Squarepeg\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Squarepeg\Models\Occurrence;

class MathnetController extends Controller
{
    public function execute(Request $request, $actionName)
    {
        $actionName = str_replace([ '-', '_', ' ' ], '', Str::title($actionName));
        $actionClass = 'Squarepeg\Actions\Mathnet\\' . $actionName . 'Action';

        if (! class_exists($actionClass)) {
            abort(404);
        }

        $action = new $actionClass($request->all(), $actionName);

        $occurrence = Occurrence::firstOrNew([
            'param' => $this->paramArrayToString($action->getParams()),
            'type' => $actionClass,
        ], [ 'occurrences' => 0 ]);

        $occurrence->occurrences++;
        $occurrence->save();

        $value = $action->handle();

        return $this->payload($this->paramArrayToString($action->getParams()), $value, $actionClass);
    }

    private function paramArrayToString(array $param): string
    {
        array_walk($param, function(&$val, $key) {
            $val = $key . ':' . $val;
        });

        return implode(',', $param);
    }

    private function payload($param, string $value, string $squareClass): array
    {
        return [
            'datetime' => now(),
            'value' => $value,
            'param' => $param,
            'occurrences' => Occurrence::where('param', $param)->sum('occurrences'),
            'type' => $squareClass,
            'occurrences_of_type' => Occurrence::where([
                'param' => $param,
                'type' => $squareClass,
            ])->first()->occurrences,
        ];
    }
}
