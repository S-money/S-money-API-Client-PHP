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
     * @param CardPaymentFacade $payment
     *
     * @return CardPaymentFacade
     */
    public function create(CardPaymentFacade $payment)
    {
        $uri = 'payins/cardpayments';
        $body = $this->serializer->serialize($payment, 'json');
        $res = $this->action('POST', $uri, ['body' => $body]);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\CardPaymentFacade', 'json');
    }

    /**
     * @param CardPaymentFacade $payment
     * @param string            $appUserId
     *
     * @return CardPaymentFacade
     */
    public function createMultiSchedules(CardPaymentFacade $payment, $appuserId)
    {
        $uri = 'users/'.$appuserId.'/payins/cardpayments';
        $body = $this->serializer->serialize($payment, 'json');
        $res = $this->action('POST', $uri, ['body' => $body]);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\CardPaymentFacade', 'json');
    }

    /**
     * @param CardPaymentFacade$payment
     *
     * @return CardPaymentFacade
     */
    public function createEcv(CardPaymentFacade $payment)
    {
        $payment->availableCards = 'CB;E_CV';
        $res = $this->create($payment);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\CardPaymentFacade', 'json');
    }

    /**
     * @param CardPaymentFacade $payment
     *
     * @return CardPaymentFacade
     */
    public function createSofort(CardPaymentFacade $payment)
    {
        $payment->availableCards = 'SOFORT_BANKING';
        $res = $this->create($payment);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\CardPaymentFacade', 'json');
    }

    /**
     * @param string $orderId
     *
     * @return CardPaymentFacade
     */
    public function get($orderId)
    {
        $uri = 'payins/cardpayments/'.$orderId;
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\CardPaymentFacade', 'json');
    }

    /**
     * @param string $appUserId
     *
     * @return ArrayCollection
     */
    public function index()
    {
        $uri = 'payins/cardpayments';
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'ArrayCollection<Smoney\Smoney\Facade\CardPaymentFacade>', 'json');
    }

    /**
     * @param string $uri
     * @param string $orderId
     * @param int    $amount
     * @param int    $fee
     *
     * @return CardPaymentFacade
     */
    public function baseRefund($uri, $orderId, $amount, $fee)
    {
        $refund = [
            'orderId' => $orderId,
            'amount' => $amount,
            'fee' => $fee
        ];
        $body = $this->serializer->serialize($refund, 'json');
        $res = $this->action('POST', $uri, ['body' => $body]);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\CardPaymentFacade', 'json');
    }

    /**
     * @param string $originalOrderId
     * @param string $newOrderId
     * @param int    $amount
     * @param int    $fee
     *
     * @return CardPaymentFacade
     */
    public function refund($originalOrderId, $newOrderId, $amount, $fee = 0)
    {
        $uri = 'payins/cardpayments/'.$originalOrderId.'/refunds';

        return $this->baseRefund($uri, $newOrderId, $amount, $fee);
    }

    /**
     * @param string $originalOrderId
     * @param string $sequenceNumber
     * @param int    $amount
     * @param int    $fee
     *
     * @return CardPaymentFacade
     */
    public function refundOneSequence($originalOrderId, $sequenceNumber, $amount, $fee = 0)
    {
        $uri = 'payins/cardpayments/'.$originalOrderId.'/'.$sequenceNumber.'/refunds';

        return $this->baseRefund($uri, $originalOrderId, $amount, $fee);
    }

    /**
     * @param string $originalOrderId
     * @param string $sequenceNumber
     * @param CardPaymentFacade $cardPayment
     *
     * @return CardPaymentFacade
     */
    public function cancelRefundOneSequence($originalOrderId, $sequenceNumber, CardPaymentFacade $cardPayment)
    {
        $uri = 'payins/cardpayments/'.$originalOrderId.'/'.$sequenceNumber;
        $body = $this->serializer->serialize($cardPayment, 'json');
        $res = $this->action('PUT', $uri, ['body'=>$body]);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\CardPaymentFacade', 'json');
    }

    /**
     * @param string $orderIdGlobal
     * @param string $originalOrderId
     * @param string $newOrderId
     * @param int    $amount
     * @param int    $fee
     *
     * @return CardPaymentFacade
     */
    public function refundOneFromMultiBeneficiary($orderIdGlobal, $originalSubOrderId, $newOrderId, $amount, $fee = 0)
    {
        $uri = '/payins/cardpayments/'.$orderIdGlobal.'/payments/'.$originalSubOrderId.'/refunds';

        return $this->baseRefund($uri, $newOrderId, $amount, $fee);
    }


    /**
     * @param string $orderIdGlobal
     * @param string $originalOrderId
     *
     * @return CardPaymentFacade
     */
    public function getOneFromMultiBeneficiary($orderIdGlobal, $originalOrderId)
    {
        $uri = '/payins/cardpayments/'.$orderIdGlobal.'/payments/'.$originalOrderId;

        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\CardPaymentFacade', 'json');
    }
}
