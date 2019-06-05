<?php

namespace Visterio\Exceptions\Api;

use Visterio\Client\VisterioApiError;
use Visterio\Exceptions\VisterioApiException;

class VisterioApiUnknownException extends VisterioApiException
{
    public function __construct(VisterioApiError $error)
    {
        parent::__construct(1, 'Unknown error occurred', $error);
    }
}