<?php namespace App\Providers;

use Illuminate\Http\Request;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $test = "HI";
    }

    public function boot()
    {

        $test = "HI";
    }
}
