<?php

namespace Acme\MyLibrary;

use GuzzleHttp\Psr7\Request;

class FetchXmlFeedService
{
    /**
     * @var \Http\Client\HttpClient
     */
    private $client;

    /**
     * ExampleService constructor.
     * @param \Http\Client\HttpClient $client
     */
    public function __construct(\Http\Client\HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return \SimpleXMLElement
     * @throws \Exception
     */
    public function fetch()
    {
        $request = (new Request('GET', 'https://dev98.de/feed/'))
            ->withHeader('Accept', 'application/xml');

        $response = $this->client->sendRequest($request);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Could not fetch XML feed');
        }

        return simplexml_load_string($response->getBody()->getContents());
    }
}