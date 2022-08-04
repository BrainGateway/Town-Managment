<?php

namespace Modules\Notifier\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Modules\Base\Proxies\Http\Middleware\Authenticate;
use Modules\Base\Proxies\Http\Middleware\PublicRoutes;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleNamespace = 'Modules\Notifier\Proxies\Http\Controllers';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot()
    {

        parent::boot();
        $this->middlewareAliases();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapPrivateRoutes();
        $this->mapPublicRoutes();
    }

    /**
     * Registering custom middleware Aliases
     */
    public function middlewareAliases() {
        $this->aliasMiddleware('whf.private', Authenticate::class);
        $this->aliasMiddleware('whf.public', PublicRoutes::class);
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleNamespace)
            ->group(module_path('Notifier', '/Routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->moduleNamespace)
            ->group(module_path('Notifier', '/Routes/api.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapPrivateRoutes()
    {
        Route::prefix('api/v1')
            ->middleware(['api', 'whf.private'])
            ->namespace($this->moduleNamespace)
            ->group(module_path('Notifier', '/Routes/v1/private.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapPublicRoutes()
    {
        Route::prefix('api/v1')
            ->middleware(['api', 'whf.public'])
            ->namespace($this->moduleNamespace)
            ->group(module_path('Notifier', '/Routes/v1/public.php'));
    }
}
