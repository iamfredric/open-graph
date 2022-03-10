<?php

namespace Iamfredric\OpenGraph\Contracts\Clients;

interface Client
{
    public function get(string $url): string;
}
