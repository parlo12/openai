<?php

// src/database/migrations/2024_12_20_000000_create_openai_requests_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('openai_requests', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // e.g., 'chat', 'embedding'
            $table->text('request_payload');
            $table->text('response_payload')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('openai_requests');
    }
};
