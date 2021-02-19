<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{


    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {

        $this->routes(function () {
            Route::prefix('api/admin')
                ->middleware('api')
                //->name('api-admin.')
                ->namespace($this->namespace)
                ->group(base_path('app/Modules/Admin/routes/api.php'));

            Route::middleware(['web','auth'])
                ->namespace($this->namespace)
                ->prefix('admin')
                //->name('admin-')
                ->group(base_path('app/Modules/Admin/routes/web.php'));

            Route::middleware(['web'])
                ->namespace($this->namespace)
                ->prefix('admin')
                ->group(base_path('app/Modules/Admin/routes/auth.php'));
        });
    }
}
