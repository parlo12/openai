<?php
namespace Rolflouisdor\Openai;

use Illuminate\Support\ServiceProvider;

class OpenAiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/openai.php', 'openai');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/Config/openai.php' => config_path('openai.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/database/migrations/' => database_path('migrations'),
            ], 'migrations');
        }
    }
}
