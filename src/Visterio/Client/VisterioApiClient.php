<?php

namespace Visterio\Client;

use Visterio\Methods\Employers;
use Visterio\Methods\Drivers;
use Visterio\Methods\Cars;
use Visterio\Methods\Auth;
use Visterio\Methods\Departments;

class VisterioApiClient
{
    protected const API_VERSION = '1.0';
    protected const API_HOST = 'http://api.visterio.io/';

    private $request;

    private $auth;
    private $cars;
    private $departments;
    private $drivers;
    private $employers;

    /**
     * VisterioApiClient constructor.
     * @param string $apiVersion
     * @throws \ErrorException
     */
    public function __construct(string $apiVersion = self::API_VERSION)
    {
        $this->request = new VisterioApiRequest($apiVersion, self::API_HOST);
    }

    /**
     * @return VisterioApiRequest
     */
    protected function getRequest(): VisterioApiRequest
    {
        return $this->request;
    }

    /**
     * @return Auth
     */
    public function auth(): Auth
    {
        if (!isset($this->auth)) {
            $this->auth = new Auth($this->request);
        }
        return $this->auth;
    }

    /**
     * @return Cars
     */
    public function cars(): Cars
    {
        if (!isset($this->cars)) {
            $this->cars = new Cars($this->request);
        }
        return $this->cars;
    }

    /**
     * @return Departments
     */
    public function departments(): Departments
    {
        if (!isset($this->departments)) {
            $this->departments = new Departments($this->request);
        }
        return $this->departments;
    }

    /**
     * @return Drivers
     */
    public function drivers(): Drivers
    {
        if (!isset($this->drivers)) {
            $this->drivers = new Drivers($this->request);
        }
        return $this->drivers;
    }

    /**
     * @return Employers
     */
    public function employers(): Employers
    {
        if (!isset($this->employers)) {
            $this->employers = new Employers($this->request);
        }
        return $this->employers;
    }

}