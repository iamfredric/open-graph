<?php

namespace Iamfredric\OpenGraph\Clients;

use Iamfredric\OpenGraph\Contracts\Clients\Client;

class CurlClient implements Client
{
    public function get(string $url): string
    {
        if ($handle = curl_init($url)) {
            curl_setopt_array($handle, [
                CURLOPT_CUSTOMREQUEST  => "GET",
                CURLOPT_POST           => false,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER         => false,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING       => "",
                CURLOPT_AUTOREFERER    => true,
                CURLOPT_CONNECTTIMEOUT => 120,
                CURLOPT_TIMEOUT        => 120,
                CURLOPT_MAXREDIRS      => 10
            ]);

            $response = curl_exec($handle) ?: '';

            return is_string($response) ? $response : '';
        }

        return '';
    }
}
