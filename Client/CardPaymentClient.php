<?php

namespace Smoney\Smoney\Client;

use Smoney\Smoney\Client\AbstractClient;
use Smoney\Smoney\Facade\CardPaymentFacade;

/**
 * Class CardPaymentClient
 */
class CardPaymentClient extends AbstractClient
{
    /**
     * @param string       $appUserId
     * @param PayoutFacade $payout
     */
    public function create(CardPaymentFacade $payment)
    {
        $uri = 'payins/cardpayments';
        $body = $this->serializer->serialize($payment, 'json');

        return $this->action('POST', $uri, $body);
    }

    /**
     * @param string $appUserId
     * @param int    $orderId
     */
    public function get($orderId)
    {
        $uri = 'payins/cardpayments/'.$orderId;
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\CardPaymentFacade', 'json');
    }

    /**
     * @param string $appUserId
     */
    public function index()
    {
        $uri = 'payins/cardpayments';
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'ArrayCollection<Smoney\Smoney\Facade\CardPaymentFacade>', 'json');
    }
}
