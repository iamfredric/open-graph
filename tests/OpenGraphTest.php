<?php

namespace Iamfredric\OpenGraph\Tests;

use Iamfredric\OpenGraph\Clients\FakeClient;
use Iamfredric\OpenGraph\OpenGraph;

it('can fetch and parse open graph from an url', function () {
    $client = new FakeClient();

    $client->on(
        'https://example.com',
        file_get_contents(dirname(__FILE__) . '/stubs/example.com.html')
    );

    $response = (new OpenGraph($client))
        ->url('https://example.com');

    $this->assertTrue($client->wasCalled('https://example.com'));
    $this->assertEquals('website', $response->get('type'));
    $this->assertEquals('https://example.com/', $response->get('url'));
    $this->assertEquals('Example - the sophisticated web', $response->get('title'));
    $this->assertEquals('Example is the sophisticated test file', $response->get('description'));
    $this->assertEquals('https://example.com/og-image.jpg', $response->get('image'));
});
