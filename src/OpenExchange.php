<?php

namespace Roman\ComponentApi;

use Roman\ComponentApi\Factory\HttpClientFactory;
use Roman\ComponentApi\Service\ApiRequestService;

class OpenExchange
{
    private ApiRequestService $apiRequestService;
    public function __construct()
    {
        $httpClientFactory = new HttpClientFactory();

    }
}