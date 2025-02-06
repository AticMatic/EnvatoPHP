<?php

namespace AticMatic\EnvatoPHP;

use Illuminate\Support\Facades\Http;

class EnvatoPHP
{
    private string $personalToken;
    private string $apiUrl = 'https://api.envato.com/v3';

    public function __construct(string $personalToken)
    {
        $this->personalToken = $personalToken;
    }

    private function makeRequest(string $method, string $endpoint, array $data = []): mixed
    {
        $headers = [
            'Authorization' => 'Bearer ' . $this->personalToken,
            'Accept' => 'application/json',
        ];

        try {
            $response = Http::withHeaders($headers)->$method($this->apiUrl . $endpoint, $data);

            if ($response->successful()) {
                return $response->json();
            } else {
                $errorMessage = $response->json('error.message') ?? $response->body();
                Log::error("Envato API Error: " . $response->status() . " - " . $errorMessage);
                throw new \Exception("Envato API request failed: " . $errorMessage, $response->status());
            }
        } catch (\Exception $e) {
            Log::error("Envato API Exception: " . $e->getMessage());
            throw $e; // Re-throw the exception after logging
        }
    }


    public function getItemDetails(int $itemId): mixed
    {
        return $this->makeRequest('get', '/catalog/item', ['id' => $itemId]);
    }

    // Add other Envato API methods as needed (e.g., get user details, verify purchase)
    // ...

}