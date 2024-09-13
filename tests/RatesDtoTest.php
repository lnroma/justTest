<?php

use PHPUnit\Framework\TestCase;
use Roman\ComponentApi\Factory\Dto\Response\RatesDtoFactory;

class RatesDtoTest extends TestCase
{
    protected RatesDtoFactory $dtoFactory;

    protected function setUp(): void
    {
        $this->dtoFactory = new RatesDtoFactory();
    }

    /**
     * @dataProvider ratesProvider
     */
    public function testRatesDto(float $rate): void
    {
        $ratesDto = $this->dtoFactory->create();
        $ratesDto->setAFN($rate);

        $this->assertEquals($rate, $ratesDto->getAFN());
    }

    public static function ratesProvider(): array
    {
        return [[10.00], [12.00], [13.00], [14.00], [22.00], [-10.00]];
    }
}