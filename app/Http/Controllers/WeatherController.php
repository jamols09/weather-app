<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{

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
