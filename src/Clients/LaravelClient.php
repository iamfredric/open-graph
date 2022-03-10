<?php

namespace Iamfredric\OpenGraph\Clients;

use Iamfredric\OpenGraph\Contracts\Clients\Client;

class LaravelClient implements Client
{
    public function get(string $url): string
    {
        if (! class_exists(\Illuminate\Http\Client\PendingRequest::class)) {
            throw new \Exception('The laravel client requires \Illuminate\Http\Client\PendingRequest');
        }

        if (! function_exists('app')) {
            throw new \Exception('The laravel client requires Laravel');
        }

        return app(\Illuminate\Http\Client\PendingRequest::class)
            ->get($url)
            ->body();
    }
}
