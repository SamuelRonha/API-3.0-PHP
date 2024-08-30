<?php

namespace Cielo\API30\Ecommerce;

use Cielo\API30\Ecommerce\CieloSerializable;

/**
 * Class Shipping
 *
 * @package Cielo\API30\Ecommerce
 */
class Shipping implements \JsonSerializable, CieloSerializable
{
    /** @var string $addressee */
    private $addressee;

    /** @var string $method */
    private $method;

    /** @var string $phone */
    private $phone;

    /** @var string $identify */
    private $identify;

    /** @var string $identifyType */
    private $identifyType;

    /**
     * Shipping constructor.
     *
     * @param null
     */
    public function __construct()
    {
    }

    /**
     * @return array
     */
    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }

    /**
     * @param \stdClass $data
     */
    public function populate(\stdClass $data)
    {
        $this->addressee  = isset($data->Addressee) ? $data->Addressee : null;
        $this->method     = isset($data->Method) ? $data->Method : null;
        $this->phone      = isset($data->Phone) ? $data->Phone : null;
        $this->identify     = isset($data->Identify) ? $data->Identify : null;
        $this->identifyType = isset($data->IdentifyType) ? $data->IdentifyType : null;
    }

    /**
     * @return mixed
     */
    public function getAddressee()
    {
        return $this->addressee;
    }

    /**
     * @param $addressee
     *
     * @return $this
     */
    public function setAddressee($addressee)
    {
        $this->addressee = $addressee;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param $method
     *
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param $phone
     *
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getIdentify()
    {
        return $this->identify;
    }

    /**
     * @param $identify
     *
     * @return $this
    */
    public function setIdentify($identify)
    {
        $this->identify = $identify;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getIdentifyType()
    {
        return $this->identifyType;
    }

    /**
     * @param $identifyType
     *
     * @return $this
    */
    public function setIdentifyType($identifyType)
    {
        $this->identifyType = $identifyType;

        return $this;
    }
}
