<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class planTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        // Send a GET request to the '/' route
        $client->request('GET', '/');

        // Assert that the response is successful (HTTP 200)
        $this->assertSame(200, $client->getResponse()->getStatusCode());

        // Assert that the expected template is rendered
        $this->assertStringContainsString('band/index.html.twig', $client->getResponse()->getContent());

        // Add more assertions as needed to test the data passed to the template
    }
}
