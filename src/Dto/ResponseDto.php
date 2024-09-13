<?php

namespace Roman\ComponentApi\Dto;

use Roman\ComponentApi\Dto\Response\RatesDto;

class ResponseDto
{
    private int $timeStamp;
    private string $base;
    private RatesDto $rates;

    public function getTimeStamp(): int
    {
        return $this->timeStamp;
    }

    public function setTimeStamp(int $timeStamp): void
    {
        $this->timeStamp = $timeStamp;
    }

    public function getBase(): string
    {
        return $this->base;
    }

    public function setBase(string $base): void
    {
        $this->base = $base;
    }

    public function getRates(): RatesDto
    {
        return $this->rates;
    }

    public function setRates(RatesDto $rates): void
    {
        $this->rates = $rates;
    }
}