<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Scraper;

class ScraperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Scraper',function(){
//          $this->app->singleton('Scraper',function(){
//        $this->app->bindif('Scraper',function(){
            return new Scraper();
    });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
