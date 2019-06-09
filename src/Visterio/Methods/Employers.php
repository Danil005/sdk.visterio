<?php

namespace Visterio\Methods;

use Visterio\Client\VisterioApiRequest;

class Employers
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
    public function get(string $accessToken, array $params = [])
    {
        return $this->request->get('employers.get', $accessToken, $params);
    }

    /**
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function create(string $accessToken, array $params = [])
    {
        return $this->request->put('employers.create', $accessToken, $params);
    }

    /**
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function edit(string $accessToken, array $params = [])
    {
        return $this->request->patch('employers.edit', $accessToken, $params);
    }

    /**
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function delete(string $accessToken, array $params = [])
    {
        return $this->request->delete('employers.delete', $accessToken, $params);
    }

    /**
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function restore(string $accessToken, array $params = [])
    {
        return $this->request->post('employers.restore', $accessToken, $params);
    }
}