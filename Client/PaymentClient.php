<?php

namespace Smoney\Smoney\Client;

use Smoney\Smoney\Client\AbstractClient;
use Smoney\Smoney\Facade\PaymentFacade;

/**
 * Class PaymentClient
 */
class PaymentClient extends AbstractClient
{
    /**
     * @param string $appUserId
     * @param int    $orderId
     */
    public function get($appUserId, $orderId)
    {
        $uri = 'users/'.$appUserId.'/payments/'.$orderId;
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\PaymentFacade', 'json');
    }

    /**
     * @param string $appUserId
     */
    public function index($appUserId)
    {
        $uri = 'users/'.$appUserId.'/payments';
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'ArrayCollection<Smoney\Smoney\Facade\BankAccountFacade>', 'json');
    }

    /**
     * @param string        $appUserId
     * @param PaymentFacade $payment
     */
    public function create($appUserId, PaymentFacade $payment)
    {
        $uri = 'users/'.$appUserId.'/payments';
        $body = $this->serializer->serialize($payment, 'json');

        return $this->action('POST', $uri, $body);
    }
}
