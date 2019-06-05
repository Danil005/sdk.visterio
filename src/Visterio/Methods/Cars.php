<?php

namespace Visterio\Methods;

use Visterio\Client\VisterioApiRequest;

class Cars
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
     * @return VisterioApiRequest
     */
    public function getRequest(): VisterioApiRequest
    {
        return $this->request;
    }

    /**
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function get(string $accessToken, array $params = [])
    {
        return $this->getRequest()->get('cars.get', $accessToken);
    }

    /**
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function create(string $accessToken, array $params = [])
    {
        return $this->getRequest()->put('cars.create', $accessToken, $params);
    }
}