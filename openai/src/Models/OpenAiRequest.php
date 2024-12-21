<?php 
// src/OpenAiService.php

use Rolflouisdor\Openai\Models\OpenAiRequest;

public function makeRequest($endpoint, $method = 'POST', $payload = [])
{
    $requestLog = OpenAiRequest::create([
        'type' => $endpoint,
        'request_payload' => json_encode($payload),
    ]);

    $response = Http::withToken($this->apiKey)
        ->$method("{$this->baseUrl}/{$endpoint}", $payload);

    if ($response->failed()) {
        throw new \Exception("OpenAI API Error: {$response->body()}");
    }

    $requestLog->update(['response_payload' => $response->body()]);

    return $response->json();
}

