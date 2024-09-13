<?php

namespace Roman\ComponentApi\Factory\Dto\Response;

use Roman\ComponentApi\Dto\Response\RatesDto;

class RatesDtoFactory
{
    public function create(array $data = []): RatesDto
    {
        $ratesDto = new RatesDto();
        $ratesDto->setData($data);

        return $ratesDto;
    }
}