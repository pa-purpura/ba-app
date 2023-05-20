<?php

// declare(strict_types=1);

namespace App\Http\Procedures;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Sajya\Server\Procedure;


class AssignmentProcedure extends Procedure
{
    /**
     * The name of the procedure that is used for referencing.
     *
     * @var string
     */
    public static string $name = 'Assignment';

    /**
     * Given a range of dates returns the oil price trend on those days.
     *
     * @param Request $request
     *
     * @return json-rpc
     */

    public function GetOilPriceTrend(Request $request)
    {
        $response = Http::get('https://datahub.io/core/oil-prices/r/brent-day.json');

        $items = $response->json();
        $start = $request->input('startDateISO8601');
        $end = $request->input('endDateISO8601');
        $prices = [];

        foreach ($items as $item) {
            if ($end >= $item["Date"] && $item["Date"] >= $start) {
                array_push($prices, $item);
            }
        }

        return ['prices' => $prices];
    }
}