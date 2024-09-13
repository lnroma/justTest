<?php

namespace Roman\ComponentApi\Factory;

use GuzzleHttp\Client;

class HttpClientFactory
{
    public function createHttpClient(): Client
    {
        return new Client();
    }
}