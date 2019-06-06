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
        return $this->request->get('cars.get', $accessToken, $params);
    }

    /**
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function create(string $accessToken, array $params = [])
    {
        return $this->request->put('cars.create', $accessToken, $params);
    }

    /**
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function view(string $accessToken, array $params = [])
    {
        return $this->request->get('cars.view', $accessToken, $params);
    }

    /**
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function edit(string $accessToken, array $params = [])
    {
        return $this->request->patch('cars.edit', $accessToken, $params);
    }

    /**
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function delete(string $accessToken, array $params = [])
    {
        return $this->request->delete('cars.delete', $accessToken, $params);
    }

    /**
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function restore(string $accessToken, array $params = [])
    {
        return $this->request->post('cars.restore', $accessToken, $params);
    }

    /**
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function setMechanic(string $accessToken, array $params = [])
    {
        return $this->request->post('cars.setMechanic', $accessToken, $params);
    }


}