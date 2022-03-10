<?php

namespace Iamfredric\OpenGraph;

use DOMDocument;
use Iamfredric\OpenGraph\Clients\CurlClient;
use Iamfredric\OpenGraph\Contracts\Clients\Client;

class OpenGraph
{
    public function __construct(
        protected Client $client = new CurlClient()
    ) {
    }

    public function url(string $url): Collection
    {
        $body = $this->client->get($url);

        $dom = new DOMDocument();

        $dom->loadHTML('<?xml encoding="utf-8" ?>'.$body, LIBXML_NOWARNING | LIBXML_NOERROR);
        $metas = [];

        foreach ($dom->getElementsByTagName('meta') as $meta) {
            if (str_starts_with($meta->getAttribute('property'), 'og:')) {
                $metas[substr($meta->getAttribute('property'), 3)] = $meta->getAttribute('content');
            }
        }

        return new Collection($metas);
    }
}
