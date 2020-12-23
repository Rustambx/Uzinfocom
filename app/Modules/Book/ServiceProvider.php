<?php

namespace App\Modules\Book;

use App\Modules\Book\Services\BookService;
use Illuminate\Support\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');
        $this->loadViewsFrom(__DIR__.'/Views', 'book');
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(BookService::class, function () {
            return new BookService();
        });

        $this->app->alias(BookService::class, 'BookService');
    }
}
