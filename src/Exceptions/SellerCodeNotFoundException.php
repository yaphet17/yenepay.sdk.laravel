<?php

namespace YenePay\YenePay\Exceptions;

use Exception;
use Throwable;

class SellerCodeNotFoundException extends Exception
{
    function __construct(int $code = 0, ?Throwable $previous = null)
    {
        $message = "Seller code not found.\n Add YP_SELLER_CODE={your-seller-code} in your .env file.";
        parent::__construct($message, $code, $previous);
    }

}
