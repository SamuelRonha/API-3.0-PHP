<?php

namespace Cielo\API30\Ecommerce;

/**
 * Class MultipleSale
 *
 * @package Cielo\API30\Ecommerce
 */
class MultipleSale implements \JsonSerializable
{
    private $payments;

    /**
     * MultipleSale constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $json
     *
     * @return MultipleSale
     */
    public static function fromJson($json)
    {
        $object = json_decode($json);

        $multipleSale = new MultipleSale();
        $multipleSale->populate($object);

        return $multipleSale;
    }

    /**
     * @param \stdClass $data
     */
    public function populate(\stdClass $data)
    {
        $dataProps = get_object_vars($data);

        if (isset($dataProps['Payments'])) {
            foreach ($dataProps['Payments'] as $payment) {
                $oPayment = new Payment();
                $oPayment->populate($payment);
                $this->addPayment($oPayment);
            }
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }

    /**
     * @return array
     */
    public function getPayments()
    {
        return $this->payments;
    }

    public function setPayments(array $payments)
    {
        $this->payments = $payments;

        return $this;
    }

    public function addPayment(Payment $payment)
    {
        $this->payments[] = $payment;

        return $this;
    }
}
