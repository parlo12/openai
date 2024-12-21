<?php

namespace Tests\Feature;

use Orchestra\Testbench\TestCase;

class ConfigTest extends TestCase
{
    /** @test */
    public function it_checks_configuration()
    {
        $config = config('openai.api_key');
        $this->assertNotNull($config, 'OpenAI API key should not be null');
    }

    protected function getPackageProviders($app)
    {
        return [
            \Rolflouisdor\Openai\OpenAiServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('openai.api_key', 'test-key');
    }
}
