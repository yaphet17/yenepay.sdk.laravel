<?php

namespace YenePay\YenePay\Http\Models;

/**
 * Class IPN
 *
 * IPN (Instant Payment Notification) details:
 *
 * @package YenePay\YenePay\Models
 */
class IPN
{
    private $totalAmount;
    private $buyerId;
    private $merchantOrderId;
    private $merchantId;
    private $merchantCode;
    private $transactionId;
    private $transactionCode;
    private $status;
    private $currency;
    private $signature;

    function __construct()
    {

    }

    /**
     * Total amount paid
     *
     * @param string $totalAmount
     *
     * @return $this
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    /**
     * Total amount paid
     *
     * @return string
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * Set the customer's id on YenePay
     *
     * @param string $buyerId
     *
     * @return $this
     */
    public function setBuyerId($buyerId)
    {
        $this->buyerId = $buyerId;
        return $this;
    }

    /**
     * Get the customer's id on YenePay
     *
     * @return string
     */
    public function getBuyerId()
    {
        return $this->buyerId;
    }

    /**
     * Get id that identifies the order on the merchant application
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
     * Get id that identifies the order on the merchant application
     *
     * @return string
     */
    public function getMerchantOrderId()
    {
        return $this->merchantOrderId;
    }

    /**
     * Set id merchant's id on YenePay
     *
     * @param string $merchantId
     *
     * @return $this
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
        return $this;
    }

    /**
     * Get the merchant's id on YenePay
     *
     * @return string
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * Set an identifier for the merchant assigned by YenePay
     *
     * @param string $merchantCode
     *
     * @return $this
     */
    public function setMerchantCode($merchantCode)
    {
        $this->merchantCode = $merchantCode;
        return $this;
    }

    /**
     * Get an identifier for the merchant assigned by YenePay
     *
     * @return string
     */
    public function getMerchantCode()
    {
        return $this->merchantCode;
    }

    /**
     * Set an identifier for the payment order assigned by YenePay
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
     * Get an identifier for the payment order assigned by YenePay
     *
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * Set an order code for the payment order assigned by YenePay
     *
     * @return $this
     */
    public function setTransactionCode($transactionCode)
    {
        $this->transactionCode = $transactionCode;
        return $this;
    }

    /**
     * Get an order code for the payment order assigned by YenePay
     *
     * @return string
     */
    public function getTransactionCode()
    {
        return $this->transactionCode;
    }

    /**
     * Set order status value for the payment
     *
     * @param string $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get order status value for the payment
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set currency code used for payment
     *
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * Get currency code used for payment
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set digital signature of the ipn
     *
     * @param string $signature
     *
     * @return $this
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
        return $this;
    }

    /**
     * Get digital signature of the ipn
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    public function getAsKeyValue()
    {
        $dictionary = array();
        if (is_null($this->getTotalAmount()))
            $dictionary["TotalAmount"] = $this->getTotalAmount();
        if (is_null($this->getBuyerId()))
            $dictionary["BuyerId"] = $this->getBuyerId();
        if (is_null($this->getMerchantOrderId()))
            $dictionary["MerchantOrderId"] = $this->getMerchantOrderId();
        if (is_null($this->getMerchantCode()))
            $dictionary["MerchantCode"] = $this->getMerchantCode();
        if (is_null($this->getMerchantId()))
            $dictionary["MerchantId"] = $this->getMerchantId();
        if (is_null($this->getTransactionCode()))
            $dictionary["TransactionCode"] = $this->getTransactionCode();
        if (is_null($this->getTransactionId()))
            $dictionary["TransactionId"] = $this->getTransactionId();
        if (is_null($this->getStatus()))
            $dictionary["Status"] = $this->getStatus();
        if (is_null($this->getCurrency()))
            $dictionary["Currency"] = $this->getCurrency();
        if (is_null($this->getSignature()))
            $dictionary["Signature"] = $this->getSignature();

        return $dictionary;
    }
}
