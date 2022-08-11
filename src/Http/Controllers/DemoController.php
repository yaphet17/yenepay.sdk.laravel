<?php

namespace YenePay\YenePay\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use YenePay\YenePay\Facades\YenePay;
use YenePay\YenePay\Http\Models\CheckoutOptions;
use YenePay\YenePay\Http\Models\CheckoutItem;
use YenePay\YenePay\Http\Models\CheckoutType;
use YenePay\YenePay\Http\Models\IPN;
use YenePay\YenePay\Http\Models\PDT;

class DemoController extends Controller
{


    private $yenepay;

    public function hello(){

        $checkoutOptions = new CheckoutOptions();

        $checkoutOrderItem = new CheckoutItem("NAME_OF_ITEM_PAID_FOR", "1", 1);
        $checkoutOrderItem  -> ItemId = "UNIQUE_ID_FOR_THE_ITEM";
        $checkoutOrderItem  -> DeliveryFee = "100";
        $checkoutOrderItem  -> Tax1 = "10";
        $checkoutOrderItem  -> Tax2 = "10";


        $checkoutUrl = YenePay::getSingleCheckoutUrl($checkoutOptions, $checkoutOrderItem);
        $ipnModel = new IPN();
        $ipnModel = new PDT();
        $ipn = YenePay::isIPNAuthentic($ipnModel);
        $pdt = YenePay::requestPDT($ipnModel);
        return $ipn;

    }
}
