<?php

namespace Cielo\API30\Ecommerce\Request;

use Cielo\API30\Ecommerce\MultipleSale;
use Cielo\API30\Environment;
use Cielo\API30\Merchant;
use Psr\Log\LoggerInterface;

/**
 * Class QuerySaleRequest
 *
 * @package Cielo\API30\Ecommerce\Request
 */
class QuerySaleByMerchantOrderIdRequest extends AbstractRequest
{
    private $environment;

    /**
     * QuerySaleRequest constructor.
     *
     * @param Merchant $merchant
     * @param Environment $environment
     * @param LoggerInterface|null $logger
     */
    public function __construct(Merchant $merchant, Environment $environment, LoggerInterface $logger = null)
    {
        parent::__construct($merchant, $logger);

        $this->environment = $environment;
    }

    /**
     * @param $merchantOrderId
     *
     * @return null
     * @throws \Cielo\API30\Ecommerce\Request\CieloRequestException
     * @throws \RuntimeException
     */
    public function execute($merchantOrderId)
    {
        $url = $this->environment->getApiQueryURL() . '1/sales?merchantOrderId=' . $merchantOrderId;

        return $this->sendRequest('GET', $url);
    }

    /**
     * @param $json
     *
     * @return MultipleSale
     */
    protected function unserialize($json)
    {
        return MultipleSale::fromJson($json);
    }
}
