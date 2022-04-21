<?php

namespace App\Providers;

use App\Repositories\Contact\ContactRepository;
use App\Repositories\Contact\Contract\ContactRepositoryContract;
use Illuminate\Support\ServiceProvider;

class RepositoryLayerProvider extends ServiceProvider
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
        $this->app->bind(ContactRepositoryContract::class, ContactRepository::class);
    }
}
