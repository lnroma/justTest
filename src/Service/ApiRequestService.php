<?php

declare(strict_types=1);

namespace Roman\ComponentApi\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Roman\ComponentApi\Factory\HttpClientFactory;

class ApiRequestService
{
    private Client $httpClient;

    /**
     * @param HttpClientFactory $httpClientFactory
     * @param string $baseUrl
     */
    public function __construct(
        private HttpClientFactory $httpClientFactory,
        private string $baseUrl
    ) {
        $this->httpClient = $this->httpClientFactory->createHttpClient();
        $this->baseUrl = rtrim($this->baseUrl, '/') . '/';
    }

    /**
     * @param string $uri
     * @param array $params
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function get(
        string $uri = '',
        array $params = []
    ): ResponseInterface {
        return $this->httpClient->get($this->baseUrl . $uri . '?' . http_build_query($params));
    }

    /**
     * @param string $uri
     * @param array $data
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function post(
        string $uri,
        array $data = []
    ): ResponseInterface {
        return $this->httpClient->post($this->baseUrl . $uri . '?' . http_build_query($data));
    }
}