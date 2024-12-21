<?php

namespace Tests;

use Illuminate\Support\ServiceProvider;

class TestbenchServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../src/Config/openai.php' => config_path('openai.php'),
        ], 'config');
    }
}
