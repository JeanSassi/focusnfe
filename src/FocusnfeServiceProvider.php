<?php

namespace JeanSassi\Focusnfe;

use Illuminate\Support\ServiceProvider;



class FocusnfeServiceProvider extends ServiceProvider
{


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


    }

    public function provides()
    {

    }

}
