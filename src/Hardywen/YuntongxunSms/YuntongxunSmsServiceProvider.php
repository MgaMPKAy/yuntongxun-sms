<?php namespace Hardywen\YuntongxunSms;

use Illuminate\Support\ServiceProvider;

class YuntongxunSmsServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $source = realpath(__DIR__.'/../../config/yuntongxun.php');

        $this->publishes([$source => config_path('yuntongxun.php')]);

        $this->mergeConfigFrom($source, 'yuntongxun');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['yuntongxun-sms'] = $this->app->share(function ($app) {
            return new YuntongxunSms();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['yuntongxun-sms'];
    }

}
