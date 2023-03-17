<?php
namespace LaravelReady\BlacklistWhitelist;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;


final class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap of package services
     *
     * @return  void
     */
    public function boot(Router $router): void
    {
        $this->bootPublishes();
             }

    /**
     * Register any application services
     *
     * @return  void
     */
    public function register(): void
    {        // package config file
        $this->mergeConfigFrom(__DIR__ . '/../config/blacklist-whitelist.php', 'blacklist-whitelist');
    }

    /**
     * Publishes resources on boot
     *
     * @return  void
     */
    private function bootPublishes(): void
    {        // package configs
        $this->publishes([
            __DIR__ . '/../config/blacklist-whitelist.php' => $this->app->configPath('blacklist-whitelist.php'),
        ], 'blacklist-whitelist-config');
         // migrations
        $migrationsPath = __DIR__ . '/../database/migrations/';

        $this->publishes([
            $migrationsPath => database_path('migrations/laravel-ready/blacklist-whitelist')
        ], 'blacklist-whitelist-migrations');

        $this->loadMigrationsFrom($migrationsPath);    }

}
