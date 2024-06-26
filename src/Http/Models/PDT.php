<?php

namespace YenePay\YenePay\Http\Models;

/**
 * Class PDT
 *
 * PDT (Payment Data Transfer) details:
 *
 * @package YenePay\YenePay\Models
 *
 * @property string requestType
 * @property string pdtToken
 * @property string transactionId
 * @property string merchantOrderId
 */
class PDT
{
    private $requestType;
    private $pdtToken;
    private $transactionId;
    private $merchantOrderId;

    function __construct()
    {
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this, $f = '__construct' . $i)) {
            call_user_func_array(array($this, $f), $a);
        }
    }

    function __construct1($pdtToken)
    {
        $this->pdtToken = $pdtToken;
        $this->requestType = "PDT";
    }

    function __construct3($requestType, $pdtToken, $transactionId)
    {
        $this->requestType = $requestType;
        $this->pdtToken = $pdtToken;
        $this->transactionId = $transactionId;
    }

    function __construct4($requestType, $pdtToken, $transactionId, $merchantOrderId)
    {
        $this->requestType = $requestType;
        $this->pdtToken = $pdtToken;
        $this->transactionId = $transactionId;
        $this->merchantOrderId = $merchantOrderId;
    }

    /**
     * Set PDT Request Type
     *
     * @param string $requestType
     *
     * @return $this
     */
    public function setRequestType($requestType)
    {
        $this->requestType = $requestType;
        return $this;
    }

    /**
     * Get PDT Request Type
     *
     * @return string
     */
    public function getRequestType()
    {
        return $this->requestType;
    }

    /**
     * Set merchant PDT Token
     *
     * @param string $pdtToken
     *
     * @return $this
     */
    public function setPDTToken($pdtToken)
    {
        $this->pdtToken = $pdtToken;
        return $this;
    }

    /**
     * Get merchant PDT Token
     *
     * @return string
     */
    public function getPDTToken()
    {
        return $this->pdtToken;
    }

    /**
     * Set the YenePay transaction id of the order being requested
     *
     * @param string $transactionId
     *
     * @return $this
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    /**
     * Get the YenePay transaction id of the order being requested
     *
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * Set the merchant order id
     *
     * @param string $merchantOrderId
     *
     * @return $this
     */
    public function setMerchantOrderId($merchantOrderId)
    {
        $this->merchantOrderId = $merchantOrderId;
        return $this;
    }

    /**
     * Get the merchant order id
     *
     * @return string
     */
    public function getMerchantOrderId()
    {
        return $this->merchantOrderId;
    }

    public function getAsKeyValue()
    {
        $dictionary = array();
        if (is_null($this->getRequestType()))
            $dictionary["RequestType"] = $this->getRequestType();
        if (is_null($this->getPDTToken()))
            $dictionary["PdtToken"] = $this->getPDTToken();
        if (is_null($this->getTransactionId()))
            $dictionary["TransactionId"] = $this->getTransactionId();
        if (is_null($this->getMerchantOrderId()))
            $dictionary["MerchantOrderId"] = $this->getMerchantOrderId();

        return $dictionary;
    }
}
