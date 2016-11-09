<?php

namespace Smoney\Smoney\Client;

use Smoney\Smoney\Client\AbstractClient;
use Smoney\Smoney\Facade\PayoutFacade;

/**
 * Class PayoutClient
 */
class PayoutClient extends AbstractClient
{
    /**
     * @param string $appUserId
     * @param int    $orderId
     * 
     * @return PayoutFacade
     */
    public function get($appUserId, $orderId)
    {
        $uri = 'users/'.$appUserId.'/payouts/'.$orderId;
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\PayoutFacade', 'json');
    }

    /**
     * @param string $appUserId
     * 
     * @return ArrayCollection
     */
    public function index($appUserId)
    {
        $uri = 'users/'.$appUserId.'/payouts';
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'ArrayCollection<Smoney\Smoney\Facade\BankAccountFacade>', 'json');
    }

    /**
     * @param string       $appUserId
     * @param PayoutFacade $payout
     * 
     * @return PayoutFacade
     */
    public function create($appUserId, PayoutFacade $payout)
    {
        $uri = 'users/'.$appUserId.'/payouts/storedbankaccounts';
        $body = $this->serializer->serialize($payout, 'json');
        $res = $this->action('POST', $uri, ['body'=>$body]);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\PayoutFacade', 'json');
    }
}
