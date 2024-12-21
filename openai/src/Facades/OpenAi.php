<?php

namespace Vendor\OpenAi\Facades;

use Illuminate\Support\Facades\Facade;

class OpenAi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Vendor\OpenAi\OpenAiService::class;
    }
}
