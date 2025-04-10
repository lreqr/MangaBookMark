<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class ApiClient
{
    /**
     * Create a new class instance.
     */
    protected string $baseUrl;
    protected $timeout;

    public function __construct()
    {
        $this->baseUrl = config('api.base_url'); // значение из config/api.php
        $this->timeout = config('api.timeout', 5);
    }

    /**
     * @throws Exception
     */
    protected function request($method, $uri, $data = [], $headers = [])
    {

        try {
            $response = Http::timeout($this->timeout)
                ->withHeaders($headers)
                ->{$method}($this->baseUrl . $uri, $data);
            if ($response->failed()) {
                // централизованная обработка ошибок
                throw new Exception('Ошибка API: ' . $response->body());
            }

            return $response->json();
        } catch (Exception $e) {
            // логирование, дополнительные действия
            \Log::error('API Request Error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * @throws Exception
     */
    public function get($uri, $params = [], $headers = [])
    {
        return $this->request('get', $uri, $params, $headers);
    }

    /**
     * @throws Exception
     */
    public function post($uri, $data = [], $headers = [])
    {
        return $this->request('post', $uri, $data, $headers);
    }

}
