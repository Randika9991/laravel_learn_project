<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\JobRepositoryInterface;
use App\Repositories\JobRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(JobRepositoryInterface::class, JobRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
