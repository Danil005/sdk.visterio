<?php

namespace Visterio\Exceptions;

use Visterio\Client\VisterioApiError;

class VisterioApiException extends \Exception
{
    /**
     * @var int
     */
    protected $errorCode;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var string
     */
    protected $errorMessage;
    /**
     * @var array|null
     */
    protected $errorData;

    /**
     * @var VisterioApiError
     */
    protected $error;

    /**
     * VKApiException constructor.
     * @param int $errorCode
     * @param string $description
     * @param VisterioApiError $error
     */
    public function __construct(int $errorCode, string $description, VisterioApiError $error)
    {
        $this->errorCode = $errorCode;
        $this->description = $description;
        $this->errorMessage = $error->getErrorMsg();
        $this->errorData = $error->getErrorData();
        $this->error = $error;
        parent::__construct($error->getErrorMsg(), $errorCode);
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

    /**
     * @return VisterioApiError
     */
    public function getError(): VisterioApiError
    {
        return $this->error;
    }
}