<?php

    namespace ShawnSandy\DeployKit;

    use Illuminate\Support\ServiceProvider;
    use ShawnSandy\Deploykit\Libs\Deploys;

    /**
     * Class Provider
     *
     * @package ShawnSandy\PkgStart
     */
    class DeploykitServicesProvider extends ServiceProvider
    {
        /**
         * Perform post-registration booting of services.
         *
         * @return void
         */
        public function boot()
        {
            if (!$this->app->routesAreCached()) {
                include __DIR__ . '/routes.php';
            }

            /**
             * Package views
             */
            $this->loadViewsFrom(__DIR__ . '/resources/views', 'deploys');
            $this->publishes(
                [
                    __DIR__ . '/resources/views' => resource_path('views/vendor/deploykit'),
                ], 'deploykit-views'
            );

            /**
             * Package assets
             */
            $this->publishes(
                [
                    __DIR__ . '/resources/assets/js/' => public_path('assets/deploykit/js/'),
                    __DIR__ . '/public/assets/' => public_path('assets/')
                ], 'deploykit-assets'
            );

            /**
             * Package config
             */
            $this->publishes(
                [__DIR__ . '/config/config.php' => config_path('deploykit.php')],
                'deploykit-config'
            );

            if (!$this->app->runningInConsole()) :
                include_once __DIR__ . '/Helpers/helper.php';
            endif;



            $this->loadMigrationsFrom(__DIR__.'/migrations');

            $this->publishes([
                __DIR__.'/migrations/' => database_path('migrations/')
            ], 'deploykit-migrations');


        }

        /**
         * Register any package services.
         *
         * @return void
         */
        public function register()
        {

            $this->mergeConfigFrom(
                __DIR__ . '/config/config.php', 'deploykit'
            );

            $this->app->bind(
                'Deploys', function () {
                return new Deploys();
            }
            );

        }
    }
