<?php

namespace Visterio\Client;

use Visterio\Exceptions\VisterioApiException;
use Visterio\Exceptions\VisterioClientException;

trait VisterioRequestMethods
{
    private function methodNotAllow()
    {
        return json_encode(json_decode(json_encode([
            'success' => false,
            'message' => 'Method not found',
            'code' => -901,
            'status' => 405
        ])));
    }
    /**
     * Makes post request.
     *
     * @param string $method
     * @param string $accessToken
     * @param array $params
     * @param bool $toArray
     * @return mixed|null
     */
    public function post(string $method, ?string $accessToken, array $params = [], bool $toArray = false)
    {
        $methodToArray = $toArray ? 'toArray' : 'toObject';

        try {
            return $this->prepareRequest($method, $accessToken, 'post', $params);
        } catch (VisterioApiException $e) {
            return $e->getError()->getErrorResponse()->$methodToArray();
        } catch (VisterioClientException $e) {
            if( $e->getMessage() == self::KEY_METHOD_NOT_ALLOW) {
                return $this->methodNotAllow();
            }
            return $e;
        }
    }

    /**
     * Makes get request.
     *
     * @param string $method
     * @param string $accessToken
     * @param array $params
     * @param bool $toArray
     * @return mixed|null
     */
    public function get(string $method, ?string $accessToken, array $params = [], bool $toArray = false)
    {
        $methodToArray = $toArray ? 'toArray' : 'toObject';

        try {
            return $this->prepareRequest($method, $accessToken, 'get', $params);
        } catch (VisterioApiException $e) {
            return $e->getError()->getErrorResponse()->$methodToArray();
        } catch (VisterioClientException $e) {
            if( $e->getMessage() == self::KEY_METHOD_NOT_ALLOW) {
                return $this->methodNotAllow();
            }

            return $e;
        }
    }

    /**
     * Makes put request.
     *
     * @param string $method
     * @param string $accessToken
     * @param array $params
     * @param bool $toArray
     * @return mixed|null
     */
    public function put(string $method, ?string $accessToken, array $params = [], bool $toArray = false)
    {
        $methodToArray = $toArray ? 'toArray' : 'toObject';
        try {
            return $this->prepareRequest($method, $accessToken, 'put', $params);
        } catch (VisterioApiException $e) {
            return $e->getError()->getErrorResponse()->$methodToArray();
        } catch (VisterioClientException $e) {
            if( $e->getMessage() == self::KEY_METHOD_NOT_ALLOW) {
                return $this->methodNotAllow();
            }
            return $e;
        }
    }

    /**
     * Makes patch request.
     *
     * @param string $method
     * @param string $accessToken
     * @param array $params
     * @param bool $toArray
     * @return mixed|null
     */
    public function patch(string $method, ?string $accessToken, array $params = [], bool $toArray = false)
    {
        $methodToArray = $toArray ? 'toArray' : 'toObject';

        try {
            return $this->prepareRequest($method, $accessToken, 'patch', $params);
        } catch (VisterioApiException $e) {
            return $e->getError()->getErrorResponse()->$methodToArray();
        } catch (VisterioClientException $e) {
            if( $e->getMessage() == self::KEY_METHOD_NOT_ALLOW) {
                return $this->methodNotAllow();
            }
            return $e;
        }
    }

    /**
     * Makes delete request.
     *
     * @param string $method
     * @param string $accessToken
     * @param array $params
     * @param bool $toArray
     * @return mixed|null
     */
    public function delete(string $method, ?string $accessToken, array $params = [], bool $toArray = false)
    {
        $methodToArray = $toArray ? 'toArray' : 'toObject';

        try {
            return $this->prepareRequest($method, $accessToken, 'delete', $params);
        } catch (VisterioApiException $e) {
            return $e->getError()->getErrorResponse()->$methodToArray();
        } catch (VisterioClientException $e) {
            if( $e->getMessage() == self::KEY_METHOD_NOT_ALLOW) {
                return $this->methodNotAllow();
            }
            return $e;
        }
    }
}