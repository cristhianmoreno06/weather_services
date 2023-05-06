<?php

namespace App\Http\Controllers;

use App\Models\HumidityData;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class WeatherController extends Controller
{
    /**
     * @throws GuzzleException
     */
    public function humidity()
    {
        $cityIds = [4164138, 4167147, 5128581]; // Miami, Orlando, New York
        $apiKey = env('OPENWEATHERMAP_API_KEY');

        $client = new Client();
        $responses = [];

        foreach ($cityIds as $cityId) {
            $url = "https://api.openweathermap.org/data/2.5/weather?id=$cityId&appid=$apiKey";
            $response = $client->request('GET', $url);
            $json = json_decode($response->getBody(), true);
            $humidity = $json['main']['humidity'];
            $lon = $json['coord']['lon'];
            $lat = $json['coord']['lat'];
            $responses[] = ['city' => $json['name'], 'humidity' => $humidity, 'long' => $lon, 'lat' => $lat];

            $humidityDataModel = new HumidityData();
            $humidityDataModel->city = $json['name'];
            $humidityDataModel->humidity = $humidity;
            $humidityDataModel->save();

        }

        return response()->json(['data' => $responses]);
    }

    public function historyHumidity()
    {
        return response()->json(HumidityData::all());
    }
}
