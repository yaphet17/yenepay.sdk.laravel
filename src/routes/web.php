<?php

use Illuminate\Support\Facades\Route;

Route::group(["namespace" => "YenePay\YenePay\Http\Controllers"], function(){
    Route::get('/hello', 'DemoController@hello');

});
