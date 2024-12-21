<?php 

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Rolflouisdor\Openai\Models\OpenAiRequest;
use Tests\TestCase;

class OpenAiRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_request()
    {
        $data = [
            'type' => 'chat',
            'request_payload' => '{"message": "Hello"}',
            'response_payload' => '{"reply": "Hi"}',
        ];

        $request = OpenAiRequest::create($data);

        $this->assertDatabaseHas('openai_requests', $data);
    }
}
