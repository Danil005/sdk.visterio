<?php

namespace Visterio\Methods;

use Visterio\Client\VisterioApiRequest;

class Departments
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
     * Make request to get departments.
     *
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function get(string $accessToken, array $params = [])
    {
        return $this->request->get('departments.get', $accessToken, $params);
    }

    /**
     * Make request to create department.
     *
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function create(string $accessToken, array $params = [])
    {
        return $this->request->put('departments.create', $accessToken, $params);
    }

    /**
     * Make request to delete department.
     *
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function delete(string $accessToken, array $params = [])
    {
        return $this->request->delete('departments.delete', $accessToken, $params);
    }

    /**
     * Make request to edit department.
     *
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function edit(string $accessToken, array $params = [])
    {
        return $this->request->patch('departments.edit', $accessToken, $params);
    }

    /**
     * Make request to view department.
     *
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function view(string $accessToken, array $params = [])
    {
        return $this->request->get('departments.view', $accessToken,$params);
    }

    /**
     * Make request to set director department.
     *
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function setDirector(string $accessToken, array $params = [])
    {
        return $this->request->post('departments.setDirector', $accessToken, $params);
    }

    /**
     * Make request to restore department.
     *
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function restore(string $accessToken, array $params = [])
    {
        return $this->request->post('departments.restore', $accessToken, $params);
    }
}