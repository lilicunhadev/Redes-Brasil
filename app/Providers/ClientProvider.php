<?php
namespace App\Providers;
use App\Client;
use Illuminate\Support\ServiceProvider;
class ClientProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('arrayclients', Client::all());
        });
    }

}