<?php

namespace App\Providers;

use App\Services\Contact\ContactService;
use App\Services\Contact\Contract\ContactServiceContract;
use Illuminate\Support\ServiceProvider;

class ServiceLayerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ContactServiceContract::class, ContactService::class);
    }
}
