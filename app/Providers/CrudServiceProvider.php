<?php

namespace App\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

/**
 * Class CrudServiceProvider.
 *
 * @author Evanny Karol Hernandez Garcia <evannykarol1990@gmail.com>
 */
class CrudServiceProvider extends ServiceProvider
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
        // Get namespace.
        $nameSpace = $this->app->getNamespace();

        // Set namespace alias for AppController.
        AliasLoader::getInstance()->alias('Controller', $nameSpace.'Http\Controllers\Controller');

        // Routes.
        $this->app->router->group(['namespace' => $nameSpace.'Http\Controllers'], function () {
            require base_path('routes/web.php');
        });

        // Public
        $this->publishes([__DIR__.'/../public' => public_path(),
        ], 'public');

        // views
        $this->publishes([__DIR__.'/Publishes/Views' => base_path('/resources/views')], 'views');

        $this->publishes([__DIR__.'/Publishes/Controllers' => app_path('/Http/Controllers')], 'Controllers');

        // Load Views.
        $this->loadViewsFrom(base_path('resources/views'), 'scaffold-interface');

        // Migrations.
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations'),
        ], 'migrations');

        //config path.
        $configPath = __DIR__.'/../config/config.php';

        //register config.
        $this->publishes([
            $configPath => config_path('crud/config.php'), ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('laravelRequest', \Illuminate\Http\Request::class);

        $this->app->singleton('Respuesta', \App\Crud\Respuesta::class);

        $this->app->singleton('AppFunction', \App\Crud\AppFunction::class);

        $this->app->singleton('Datasystem', function ($app) {
            return new \App\Crud\Datasystem\Datasystem($app->make('Respuesta')->getRequest());
        });

        $this->app->singleton('NamesGenerate', function ($app) {
            return new \App\Crud\Generators\NamesGenerate($app->make('Respuesta')->getRequest());
        });

        $this->app->singleton('Path', \App\Crud\Filesystem\Path::class);

        $this->app->singleton('Generator', \App\Crud\Generators\Generator::class);

        $this->app->singleton('ModelGenerate', \App\Crud\Generators\ModelGenerate::class);

        $this->app->singleton('ViewGenerate', \App\Crud\Generators\ViewGenerate::class);

        $this->app->singleton('MigrationGenerate', \App\Crud\Generators\MigrationGenerate::class);

        $this->app->singleton('ControllerGenerate', \App\Crud\Generators\ControllerGenerate::class);

        $this->app->singleton('RouteGenerate', \App\Crud\Generators\RouteGenerate::class);
    }
}