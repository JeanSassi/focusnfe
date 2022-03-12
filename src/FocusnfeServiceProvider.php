<?php

namespace JeanSassi\Focusnfe;

use Illuminate\Support\ServiceProvider;
use JeanSassi\Focusnfe\NFSe;


class FocusnfeServiceProvider extends ServiceProvider
{
    public $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/focusnfe.php' => config_path('focusnfe.php'),
        ], 'focusnfe');

        $this->mergeConfigFrom(
            __DIR__ . '/../config/focusnfe.php',
            'focusnfe'
        );

    }


    public function register()
    {

        $this->app->singleton(NFSe::class, function ($app) {
            $instance = new NFSe();
            $instance->setConfig(config('focusnfe'));


            return $instance;
        });

    }

    public function provides()
    {
        return [

            NFSe::class
        ];
    }

}
