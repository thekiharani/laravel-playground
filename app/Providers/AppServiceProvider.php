<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Channel;
use App\Http\View\Composers\ChannelComposer;
use Illuminate\Support\Facades\View;
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
        $this->app->singleton(PaymentGatewayContract::class, function ($app) {
            if(request()->has('credit')) {
                return new CreditPaymentGateway('KES');
            }
            return new BankPaymentGateway('KES');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Option #1 - Every single view
//        View::share('channels',Channel::orderBy('name')->get());

        // Option #2 - Granular views with wildcard
        /*View::composer(['posts.*', 'channels.index'], function ($view) {
            $view->with('channels', Channel::orderBy('name')->get());
        });*/

        // Option #3 - Dedicated Class
        View::composer('partials.channels.*', ChannelComposer::class);
    }
}
