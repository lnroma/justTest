<?php

namespace Roman\ComponentApi\Factory\Dto;

use Roman\ComponentApi\Dto\ResponseDto;

class ResponseDtoFactory
{
    public function create(): ResponseDto
    {
        return new ResponseDto();
    }
}