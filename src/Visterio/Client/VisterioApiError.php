<?php

namespace Visterio\Client;

class VisterioApiError
{
    protected const KEY_ERROR_CODE = 'code';
    protected const KEY_ERROR_MESSAGE = 'message';
    protected const KEY_ERROR_DATA = 'data';

    protected $errorCode;
    protected $errorMessage;
    protected $errorData;
    protected $response;

    /**
     * VisterioApiError constructor.
     * @param array $error
     */
    public function __construct(array $error)
    {
        $this->errorCode = isset($error[self::KEY_ERROR_CODE]) ? intval($error[self::KEY_ERROR_CODE]) : null;
        $this->errorMessage = isset($error[self::KEY_ERROR_MESSAGE]) ? $error[self::KEY_ERROR_MESSAGE] : null;
        $this->errorData = isset($error[self::KEY_ERROR_DATA]) ? $error[self::KEY_ERROR_DATA] : null;
    }

    /**
     * @return int|null
     */
    public function getErrorCode(): ?int
    {
        return $this->errorCode;
    }

    /**
     * @return string|null
     */
    public function getErrorMsg(): ?string
    {
        return $this->errorMessage;
    }

    /**
     * @return array|null
     */
    public function getErrorData(): ?array
    {
        return $this->errorData;
    }

    /**
     * @return VisterioApiError
     */
    public function getErrorResponse(): VisterioApiError
    {
        $this->response = [
            'success' => false,
            'error' => [
                'message' => $this->getErrorMsg(),
                'code' => $this->getErrorCode(),
                'data' => $this->getErrorData()
            ]
        ];
        return $this;
    }

    /**
     * @return false|string
     */
    public function toObject(): string
    {
        return json_encode($this->response);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->response;
    }
}