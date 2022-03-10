<?php

namespace Iamfredric\OpenGraph\Clients;

use Iamfredric\OpenGraph\Contracts\Clients\Client;

class FakeClient implements Client
{
    /**
     * @var array<string>
     */
    protected array $called = [];

    /**
     * @var array<string,string>
     */
    protected array $responses = [];

    public function get(string $url): string
    {
        $this->called[] = $url;

        return $this->responses[$url] ?? '';
    }

    public function on(string $url, string $response): static
    {
        $this->responses[$url] = $response;

        return $this;
    }

    public function wasCalled(string $url): bool
    {
        return in_array($url, $this->called);
    }
}
