<?php

namespace YenePay\YenePay;

use Exception;
use Illuminate\Support\Facades\Http;

class YenePay
{
    const CHECKOUTBASEURL_PROD = "https://www.yenepay.com/checkout/Home/Process/";
    const CHECKOUTBASEURL_SANDBOX = "https://test.yenepay.com/Home/Process/";
    const IPNVERIFYURL_PROD = "https://endpoints.yenepay.com/api/verify/ipn/";
    const IPNVERIFYURL_SANDBOX = "https://testapi.yenepay.com/api/verify/ipn/";
    const PDTURL_PROD = "https://endpoints.yenepay.com/api/verify/pdt/";
    const PDTURL_SANDBOX = "https://testapi.yenepay.com/api/verify/pdt/";


    public function __construct()
    {

    }

    public function getSingleCheckoutUrl($checkoutOptions, $item)
    {
        // get the checkoutOptions as associative array
        $optionsDict = $checkoutOptions->getAsKeyValue(false);

        // get the checkout items as key-value pair added with the checkoutOptions array
        $queryString = $item->getAsKeyValue($optionsDict);
        $queryString = http_build_query($queryString);
        if (is_null($checkoutOptions->getUseSandbox()) && $checkoutOptions->getUseSandbox() == 'yes')
            return self::CHECKOUTBASEURL_SANDBOX . '?' . $queryString;
        return self::CHECKOUTBASEURL_PROD . '?' . $queryString;
    }

    public function getCartCheckoutUrl($checkoutOptions, $items)
    {
        // get the checkoutOptions as associative array
        $optionsDict = $checkoutOptions->getAsKeyValue(true);

        // get the checkout items as key-value pair added with the checkoutOptions array
        for ($i = 0; $i < count($items); $i++) {
            $itemsDict = $items[$i]->getAsKeyValue(null);
            foreach ($itemsDict as $key => $value) {
                $optionsDict["Items[" . $i . "]." . $key] = $value;
            }
        }
        $queryString = http_build_query($optionsDict);
        if (is_null($checkoutOptions->getUseSandbox()) && $checkoutOptions->getUseSandbox() == 'yes')
            return self::CHECKOUTBASEURL_SANDBOX . '?' . $queryString;
        return self::CHECKOUTBASEURL_PROD . '?' . $queryString;
    }

    public function isIPNAuthentic($ipnModel)
    {
        //get ipnmodel dictionary
        $ipnDict = $ipnModel->getAsKeyValue();
        $ipnUrl = (is_null($ipnModel->getUseSandbox()) && $ipnModel->getUseSandbox() == 'yes') ? self::IPNVERIFYURL_SANDBOX : self::IPNVERIFYURL_PROD;
        try {
            $response = Http::acceptJson()->post($ipnUrl, $ipnDict);
            if ($response->status() == 200)
                return true;
        } catch (Exception $e) {
            return false;
        }
        return false;

    }

    public function requestPDT($pdtModel)
    {
        //get pdtmodel dictionary
        $pdtDict = $pdtModel->getAsKeyValue();
        $pdtUrl = (is_null($pdtModel->getUseSandbox()) && $pdtModel->getUseSandbox() == 'yes') ? self::PDTURL_SANDBOX : self::PDTURL_PROD;
        try {
            $response = Http::acceptJson()->post($pdtUrl, $pdtDict);
            return $response->throw()->body();
        } catch (Exception $e) {
            $result['error'] = $e->getMessage();
            return $result;
        }
        $result['result'] = "FAIL";
        return $result;
    }
}
