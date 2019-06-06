<?php

namespace Visterio\Methods;

use Visterio\Client\VisterioApiRequest;

class Drivers
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
     * Make request to get drivers.
     *
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function get(string $accessToken, array $params = [])
    {
        return $this->request->get('drivers.get', $accessToken, $params);
    }
    /**
     * Make request to create driver.
     *
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function create(string $accessToken, array $params = [])
    {
        return $this->request->put('drivers.create', $accessToken, $params);
    }

    /**
     * Make request to edit driver.
     *
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function edit(string $accessToken, array $params = [])
    {
        return $this->request->patch('drivers.edit', $accessToken, $params);
    }

    /**
     * Make request to delete driver.
     *
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function delete(string $accessToken, array $params = [])
    {
        return $this->request->delete('drivers.delete', $accessToken, $params);
    }

    /**
     * Make request to restore driver.
     *
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function restore(string $accessToken, array $params = [])
    {
        return $this->request->post('drivers.restore', $accessToken, $params);
    }

    /**
     * Make request to view driver.
     *
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function view(string $accessToken, array $params = [])
    {
        return $this->request->get('drivers.view', $accessToken, $params);
    }


}