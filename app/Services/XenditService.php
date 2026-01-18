<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class XenditService
{
    protected ?string $apiKey;
    protected string $baseUrl = 'https://api.xendit.co';

    public function __construct()
    {
        $this->apiKey = config('services.xendit.key');
    }

    public function getBalance()
    {
        if (empty($this->apiKey)) {
            Log::warning('Xendit API Key is missing.');
            return null;
        }
        try {
            $response = Http::withBasicAuth($this->apiKey, '')
                ->get("{$this->baseUrl}/balance");

            if ($response->successful()) {
                return $response->json();
            }

            Log::error('Xendit Balance Error: ' . $response->body());
            return null;
        } catch (\Exception $e) {
            Log::error('Xendit Balance Exception: ' . $e->getMessage());
            return null;
        }
    }
}
