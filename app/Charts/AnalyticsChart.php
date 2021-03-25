<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class AnalyticsChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        return Chartisan::build()
            ->labels(['Jan', 'Feb', 'Mar','Apr','May','Jul','Aug','Sep','Oct','Nov','Dec'])
            ->dataset('Day', [100, 500, 400,600,800,200,700,50,300,200,900])
            ->dataset('Week', [500, 200, 300,400,500,500,200,10,200,300,1000])
            ->dataset('Month', [600, 700, 900,300,400,400,500,60,300,500,600]);
    }
}