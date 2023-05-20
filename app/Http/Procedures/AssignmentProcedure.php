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
     * Execute the procedure.
     *
     * @param Request $request
     *
     * @return array|string|integer
     */
    public function GetOilPriceTrend(Request $request)
    {
        $response = Http::get('https://datahub.io/core/oil-prices/r/brent-day.json');
        // dump($response->status());
        // dump($response->ok());

        $items = $response->json();

        $start = "2012-10-10";
        $end = "2012-11-10";

        $prices = [];

        foreach ($items as $item) {
            if ($end > $item["Date"] && $item["Date"] > $start) {
                array_push($prices, $item);
            }
        }

        // $result = json_encode(['prices' => $prices]);

        return ['prices' => $prices];
    }
}
