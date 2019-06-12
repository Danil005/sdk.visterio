<?php

namespace Visterio\Methods;

use Visterio\Client\VisterioApiRequest;

class Payments
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
    public function getBalance(string $accessToken, array $params = [])
    {
        return $this->request->get('payments.getBalance', $accessToken, $params);
    }

    /**
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function getCurrency(string $accessToken, array $params = [])
    {
        return $this->request->get('payments.currency', $accessToken, $params);
    }

    /**
     * @param string $accessToken
     * @param array $params
     * @return mixed|null
     */
    public function getOrders(string $accessToken, array $params = [])
    {
        return $this->request->get('payments.getOrders', $accessToken, $params);
    }

//    /**
//     * @param string $accessToken
//     * @param array $params
//     * @return mixed|null
//     */
//    public function subscribe(string $accessToken, array $params = [])
//    {
//        return $this->request->post('payments.subscribe', $accessToken, $params);
//    }




}