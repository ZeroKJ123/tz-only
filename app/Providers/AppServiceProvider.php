<?php

namespace App\Providers;

use App\Repositories\Contracts\CarRepositoryInterface;
use App\Repositories\Eloquent\EloquentCarRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CarRepositoryInterface::class, EloquentCarRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
