<?php

namespace Roman\ComponentApi\Service;

use GuzzleHttp\Psr7\Response;
use Roman\ComponentApi\Dto\ResponseDto;
use Roman\ComponentApi\Factory\Dto\Response\RatesDtoFactory;
use Roman\ComponentApi\Factory\Dto\ResponseDtoFactory;
use Roman\ComponentApi\Factory\HttpClientFactory;

class OpenExchangeService
{
    // @todo это надо вынести в конфигурация env но для тестового задания не хочу усложнять
    protected const APP_ID = '1019e45aab794dae8134baa7a5fce936';
    protected const APP_ID_KEY = 'app_id';
    protected const LATEST_URI = 'latest.json';
    protected const RATES = 'rates';
    protected const TIMESTAMP = 'timestamp';
    protected const BASE = 'base';

    private ApiRequestService $apiRequestService;

    /**
     * @param string $baseUrl
     * @param ResponseDtoFactory $responseDtoFactory
     * @param RatesDtoFactory $ratesDtoFactory
     * @param HttpClientFactory $httpClientFactory
     */
    public function __construct(
        private string $baseUrl,
        private ResponseDtoFactory $responseDtoFactory,
        private RatesDtoFactory $ratesDtoFactory,
        private HttpClientFactory $httpClientFactory
    ) {
        $this->responseDtoFactory = new ResponseDtoFactory();
        $this->ratesDtoFactory = new RatesDtoFactory();
        $this->httpClientFactory = new HttpClientFactory();
        $this->apiRequestService = new ApiRequestService(
            $this->httpClientFactory,
            trim($this->baseUrl, '/') . '/'
        );
    }

    /**
     * @return ResponseDto
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getLatestExchange(): ResponseDto {
        /** @var Response $response */
        $response = $this->apiRequestService->get(self::LATEST_URI, [
            self::APP_ID_KEY => self::APP_ID
        ]);

        $jsonResponse = json_decode($response->getBody()->getContents(), true);

        $responseDto = $this->responseDtoFactory->create();
        $responseDto->setBase($jsonResponse[self::BASE]);
        $responseDto->setTimeStamp($jsonResponse[self::TIMESTAMP]);

        $ratesDto = $this->ratesDtoFactory->create($jsonResponse[self::RATES]);
        $responseDto->setRates($ratesDto);

        return $responseDto;
    }
}