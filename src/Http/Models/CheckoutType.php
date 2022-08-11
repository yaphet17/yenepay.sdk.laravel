<?php

namespace YenePay\YenePay\Http\Models;

/**
 * Abstract Class CheckoutType
 *
 * Abstract class to enumerate available checkout types for YenePay
 *
 * @package YenePay\YenePay\Models
 *
 */

abstract class CheckoutType
{
    const Express = "Express";
    const Cart = "Cart";
}
