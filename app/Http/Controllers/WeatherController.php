<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{

    /**
     * Get the current weather of the user
     * @return \Illuminate\Http\Client\Response
     */
    public function current()
    {
        return Http::get(
            'http://api.weatherapi.com/v1/ip.json',
            [
                'key' => env('WEATHER_API'),
                'q' => 'auto:ip'
            ]
        );
    }

    /**
     * Get the forecast of the weather
     * @param string $country
     * @return \Illuminate\Http\Client\Response
     */
    public function forecast($country)
    {
        return Http::get(
            'http://api.weatherapi.com/v1/forecast.json',
            [
                'key' => env('WEATHER_API'),
                'q' => $country ?? 'Philippines'
            ]
        );
    }
}
