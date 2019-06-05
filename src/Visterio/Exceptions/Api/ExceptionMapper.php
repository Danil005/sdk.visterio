<?php

namespace Visterio\Exceptions\Api;

use Visterio\Client\VisterioApiError;

class ExceptionMapper
{
    /**
     * @param VisterioApiError $error
     * @return VisterioApiUnknownException
     */
    public static function parse(VisterioApiError $error)
    {
        switch ($error->getErrorCode())
        {
            case 0:
                return new VisterioApiUnknownException($error);
                break;

            default:
                return new VisterioApiUnknownException($error);
                break;
        }
    }
}