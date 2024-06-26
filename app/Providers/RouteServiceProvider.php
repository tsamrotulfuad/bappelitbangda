<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
            
            Route::group([
                'middleware' => ['api', 'cors'],
                'namespace' => $this->namespace,
                'prefix' => 'api',
            ], function ($router) {
                Route::get('/pokin/data/upload', [PokinController::class, 'data_pokin_upload']);
                Route::get('/cascading/data/upload', [CascadingController::class, 'data_cascading_upload']);
                Route::get('/manual_indikator/data/upload', [ManualIndikatorController::class, 'data_manual_indikator_upload']);                   
            });
        });
    }
}
