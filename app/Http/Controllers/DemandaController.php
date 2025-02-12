<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DemandaRequest;
use GuzzleHttp\Client;

class DemandaController extends Controller
{
    protected $client;
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_CLIENTE_URL');
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'timeout' => 30,
            'allow_redirects' => true,
            'verify' => true,
        ]);
    }

    public function index(Request $request)
    {
        $response = $this->client->get(env('API_CLIENTE_URL'), [
            'auth' => [env('API_CLIENTE_USER'), env('API_CLIENTE_PASSWORD')],
            'query' => [
                'auth' => [env('API_CLIENTE_USER'), env('API_CLIENTE_PASSWORD')],
                'TIPO' => $request->tipo,
                'INFO' => $request->info,
            ],
        ]);

        return response()->json(json_decode($response->getBody()), $response->getStatusCode());
    }

    public function store(DemandaRequest $request)
    {
        $response = $this->client->post(env('API_CLIENTE_URL'), [
            'auth' => [env('API_CLIENTE_USER'), env('API_CLIENTE_PASSWORD')],
            'json' => $request->all(),
        ]);

        return response($response->getBody(), $response->getStatusCode())
            ->header('Content-Type', 'text/html');
    }

    public function update(DemandaRequest $request)
    {
        $response = $this->client->put(env('API_CLIENTE_URL'), [
            'auth' => [env('API_CLIENTE_USER'), env('API_CLIENTE_PASSWORD')],
            'json' => $request->all(),
        ]);

        return response($response->getBody(), $response->getStatusCode())
            ->header('Content-Type', 'text/html');
    }

    public function destroy(Request $request)
    {
        $response = $this->client->delete(env('API_CLIENTE_URL'), [
            'auth' => [env('API_CLIENTE_USER'), env('API_CLIENTE_PASSWORD')],
            'json' => $request->all(),
        ]);

        return response($response->getBody(), $response->getStatusCode())
            ->header('Content-Type', 'text/html');
    }
}
