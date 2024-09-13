
<?php

use PHPUnit\Framework\TestCase;
use Roman\ComponentApi\Dto\Response\RatesDto;
use Roman\ComponentApi\Dto\ResponseDto;
use Roman\ComponentApi\Factory\Dto\Response\RatesDtoFactory;
use Roman\ComponentApi\Factory\Dto\ResponseDtoFactory;
use Roman\ComponentApi\Factory\HttpClientFactory;
use Roman\ComponentApi\Service\OpenExchangeService;

class OpenExchangeServiceTest extends TestCase
{
    protected OpenExchangeService $service;

    public function __construct(
        string $name = null,
    ) {
        $this->service = new OpenExchangeService(
            'https://openexchangerates.org/api',
            new ResponseDtoFactory(),
            new RatesDtoFactory(),
            new HttpClientFactory(),
        );

        parent::__construct($name);
    }

    public function testOpenExchangeService() {
        $lastExchangeDto = $this->service->getLatestExchange();
        $this->assertInstanceOf(ResponseDto::class, $lastExchangeDto);
        $this->assertInstanceOf(RatesDto::class, $lastExchangeDto->getRates());
    }
}