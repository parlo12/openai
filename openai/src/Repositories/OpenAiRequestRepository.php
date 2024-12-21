<?php
// src/Repositories/OpenAiRequestRepository.php

namespace Rolflouisdor\Openai\Repositories;

use Rolflouisdor\Openai\Models\OpenAiRequest;

class OpenAiRequestRepository
{
    public function getAllRequests()
    {
        return OpenAiRequest::all();
    }

    public function findRequestById($id)
    {
        return OpenAiRequest::findOrFail($id);
    }

    public function deleteRequest($id)
    {
        $request = OpenAiRequest::findOrFail($id);
        return $request->delete();
    }
}
