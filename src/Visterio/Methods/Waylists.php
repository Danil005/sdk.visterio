<?php

namespace Visterio\Methods;

use Visterio\Client\VisterioApiRequest;
use Visterio\Exceptions\VisterioApiException;
use Visterio\Exceptions\VisterioClientException;

class Waylists
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
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function createRoute(string $accessToken, array $params = [])
    {
        return $this->request->post('waylists.createRoute', $accessToken, $params);
    }

    public function getCoords(string $accessToken, array $params = [])
    {
        return $this->request->post('waylists.getCoords', $accessToken, $params);
    }

    public function getPredict(string $accessToken, array $params = [])
    {
        return $this->request->post('waylists.predict', $accessToken, $params);
    }
}