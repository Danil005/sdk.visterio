<?php

namespace Visterio\Client;

use Curl\Curl;
use Visterio\Exceptions\Api\ExceptionMapper;
use Visterio\Exceptions\VisterioClientException;
use Visterio\TransportClient\TransportClientResponse;
use Visterio\TransportClient\TransportRequestException;
use Visterio\Exceptions\VisterioApiException;

class VisterioApiRequest
{
    use VisterioRequestMethods;

    private const P_VERSION = 'v';
    private const P_ACCESS_TOKEN = 'Authorization';
    private const P_SUCCESS = 'success';

    private const KEY_ERROR_FIELD = 'error';
    private const KEY_METHOD_NOT_ALLOW = 'Invalid http status: 405';

    protected const CONNECTION_TIMEOUT = 10;
    protected const HTTP_STATUS_CODE_OK = 200;

    private $host;
    private $httpClient;
    private $version;

    private $accessToken;
    private $refreshToken;


    /**
     * VisterioApiRequest constructor.
     * @param string $apiVersion
     * @param $host
     * @throws \ErrorException
     */
    public function __construct(string $apiVersion, $host)
    {
        $this->host = $host;
        $this->version = $apiVersion;
        $this->httpClient = new Curl($this->host);
        $this->httpClient->setConnectTimeout(self::CONNECTION_TIMEOUT);
    }

    private function toArray($data)
    {
        return json_decode(json_encode($data), true);
    }

    /**
     * Makes prepare request.
     *
     * @param string $method
     * @param string $accessToken
     * @param array $params
     * @param string $rMethod
     * @return mixed|null
     * @throws VisterioApiException
     * @throws VisterioClientException
     */
    private function prepareRequest(string $method, ?string $accessToken, string $rMethod, array $params = [])
    {
        if( $accessToken != null ) {
            $this->httpClient->setHeader(self::P_ACCESS_TOKEN, 'Bearer '.$accessToken);
        }

        if( !isset($params[self::P_VERSION]) ) {
            $params[self::P_VERSION] = $this->version;
        }

        $url = $this->host . '/api/' . $method;
        try {
            $this->httpClient->$rMethod($url, $params);

            $res = $this->httpClient->getResponse();
            if( is_object($res) ) {
                $res = json_encode(json_decode(json_encode($res)));
            }

            $response = new TransportClientResponse(
                $this->httpClient->getHttpStatusCode(),
                $this->toArray($this->httpClient->getResponseHeaders()),
                $res
            );
        } catch (TransportRequestException $e) {
            throw new VisterioClientException($e);
        }

        return $this->parseResponse($response);
    }

    /**
     * @return Curl
     */
    public function getHttpClient(): Curl
    {
        return $this->httpClient;
    }


    /**
     * @param TransportClientResponse $response
     * @return mixed|null
     * @throws VisterioClientException
     * @throws \Visterio\Exceptions\Api\VisterioApiUnknownException
     */
    private function parseResponse(TransportClientResponse $response)
    {
        $this->checkHttpStatus($response);

        $body = $response->getBody();

        $decodeBody = $this->decodeBody($body);
        if( isset($decodeBody[self::P_SUCCESS]) && !$decodeBody[self::P_SUCCESS] ) {
            $error = $decodeBody[self::KEY_ERROR_FIELD];
            $apiError = new VisterioApiError($error);
            throw ExceptionMapper::parse($apiError);
        }

        return $body;
    }

    /**
     * Decodes body.
     *
     * @param string $body
     * @return array
     */
    protected function decodeBody(string $body): ?array
    {
        $decodedBody = json_decode($body, true);
        if ($decodedBody === null || !is_array($decodedBody)) {
            $decodedBody = [];
        }
        return $decodedBody;
    }

    /**
     * @param TransportClientResponse $response
     *
     * @throws VisterioClientException
     */
    protected function checkHttpStatus(TransportClientResponse $response): void {
        if ((int)$response->getHttpStatus() !== self::HTTP_STATUS_CODE_OK) {
            throw new VisterioClientException("Invalid http status: {$response->getHttpStatus()}");
        }
    }

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @return mixed
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @param string $token
     * @return $this
     */
    public function setAccessToken(string $token): VisterioApiRequest
    {
        $this->accessToken = $token;
        return $this;
    }

    /**
     * @param string $token
     * @return VisterioApiRequest
     */
    public function setRefreshToken(string $token): VisterioApiRequest
    {
        $this->refreshToken = $token;
        return $this;
    }
}