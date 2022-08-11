<?php
namespace Yenepay\Yenepay\Facades;
class YenePay extends \Illuminate\Support\Facades\Facade
{

    protected static function getFacadeAccessor()
    {
        return 'yenepay';
    }
}
