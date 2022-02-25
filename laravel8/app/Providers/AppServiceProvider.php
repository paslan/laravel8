<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('bling.*', function($view) {

            $apikey = "05573201d2f0927ef657fea413ef73b85f13bad027decfb1e4829cde3fb880402919eb3a";
            $outputType = "json";
            $url = 'https://bling.com.br/Api/v2/produtos/' . $outputType;

            $estados = ['SP' => 'São Paulo', 'PN'=> 'Paraná', 'AM' => 'Amazonas', 'GO' => 'Goiás', 'CE' => 'Ceará' ];
         
            $view->with('apikey', $apikey);
            $view->with('outputType', $outputType);
            $view->with('url', $url);
    
        });


        Paginator::useBootstrap();
    }
}
