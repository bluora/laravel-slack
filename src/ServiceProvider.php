<?php

namespace Bluora\LaravelSlack;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * The actual provider.
     *
     * @var \Illuminate\Support\ServiceProvider
     */
    protected $provider;

    /**
     * Instantiate the service provider.
     *
     * @param mixed $app
     *
     * @return void
     */
    public function __construct($app)
    {
        parent::__construct($app);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'slack');

        $this->app->singleton('bluora.slack', function ($app) {
            return new Slack($app);
        });

        $this->app->bind('Bluora\LaravelSlack\Slack', 'bluora.slack');
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('slack.php'),
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['bluora.slack'];
    }
}
