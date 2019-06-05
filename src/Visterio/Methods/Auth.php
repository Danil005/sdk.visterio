<?php

namespace Visterio\Methods;

use Visterio\Client\VisterioApiRequest;
use Visterio\Exceptions\VisterioApiException;
use Visterio\Exceptions\VisterioClientException;

class Auth
{

    /**
     * @var VisterioApiRequest
     */
    private $request;

    public function __construct(VisterioApiRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Login in
     *
     * @param array $params
     * @param bool $toArray
     * @return array|null
     */
    public function login(array $params = [], bool $toArray = false)
    {
        return $this->request->post('auth.login', null, $params, $toArray);
    }

    public function join(array $params = [], bool $toArray = false)
    {
        return $this->request->put('auth.join', null, $params, $toArray);
    }
    /**
     * Set Client ID
     * 
     * @param int $id
     * @return Auth
     */
    public function setClientId(int $id): Auth
    {
        $this->request->getHttpClient()->setHeader('x-client-id', $id);
        return $this;
    }

    /**
     * Set Client Token
     *
     * @param string $token
     * @return Auth
     */
    public function setClientToken(string $token): Auth
    {
        $this->request->getHttpClient()->setHeader('x-client-token', $token);
        return $this;
    }
}