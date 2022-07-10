<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor;

use Illuminate\Support\ServiceProvider;

class ImagorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/imagor.php' => $this->app->configPath('imagor.php'),
            ], 'imagor-config');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/imagor.php', 'imagor'
        );

        $this->app->singleton('imagor', function ($app) {
            return new Factory($app['imagor.url'], $app['imagor.signer']);
        });

        $this->app->singleton('imagor.signer', function ($app) {
            return new PathSigner($app['config']->get('imagor.secret'));
        });

        $this->app->singleton('imagor.url', function ($app) {
            return $app['config']->get('imagor.base_url');
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<int, string>
     */
    public function provides(): array
    {
        return [
            'imagor',
            'imagor.signer',
            'imagor.url',
        ];
    }
}
