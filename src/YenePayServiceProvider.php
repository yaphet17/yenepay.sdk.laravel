<?php
namespace YenePay\YenePay;;

use Illuminate\Support\ServiceProvider;

class YenePayServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/yenepay.php' => config_path('yenepay.php'),
        ]);

    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/yenepay.php', 'yenepay');

        $this->app->singleton("yenepay", function(){
            return new YenePay();
        });

        $this->app->alias("yenepay", "YenePay\YenePay\YenePay");
    }

}
