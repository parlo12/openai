<?php

namespace Vendor\OpenAi;

use Illuminate\Support\Facades\Http;

class OpenAiService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = Config('openai.api_key');
        $this->baseUrl = Config('openai.base_url');
    }

    public function makeRequest(string $endpoint, string $method = 'POST', array $payload = [])
    {
        $response = Http::withToken($this->apiKey)
            ->$method("{$this->baseUrl}/{$endpoint}", $payload);

        if ($response->failed()) {
            throw new \Exception("OpenAI API Error: {$response->body()}");
        }

        return $response->json();
    }

    public function chatCompletions(array $messages, string $model = 'gpt-4')
    {
        return $this->makeRequest('chat/completions', 'POST', [
            'model' => $model,
            'messages' => $messages,
        ]);
    }

    public function embeddings(string $input, string $model = 'text-embedding-ada-002')
    {
        return $this->makeRequest('embeddings', 'POST', [
            'model' => $model,
            'input' => $input,
        ]);
    }
}
