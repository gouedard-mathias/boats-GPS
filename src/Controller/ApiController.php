<?php


namespace App\Controller;



use Symfony\Component\HttpClient\HttpClient;

class ApiController
{
    private float $lat = 58.7984;
    private float $lng = 17.8081;
    private string $params =
        'currentDirection,currentSpeed,windDirection,windSpeed,airTemperature,cloudCover,visibility,precipitation';
    private string $source = 'sg';

    public function get()
    {
        $client = HttpClient::create([
            'headers' => [
                'Authorization' => APP_API_KEY,
            ],
        ]);
        $response = $client->request('GET',
            'https://api.stormglass.io/v2/weather/point?lat=' .
            $this->lat . '&lng=' . $this->lng . '&params=' . $this->params . '&source=' . $this->source);
        $objet = $response->toArray();
        echo '<pre>';
        var_dump($objet);
    }
}