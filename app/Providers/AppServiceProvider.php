<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use App\Models\Company;
use App\Models\Tanker;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('*', function($view) {
            $company_list = Company::all();
            $tanker_list = Tanker::all();
        
            View::share('company_list', $company_list);
            View::share('tanker_list', $tanker_list);
        });
    }
}
