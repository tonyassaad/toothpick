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
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            $this->mapWebRoutes();
            $this->mapApiRoutes();
            $this->mapAdminApiRoutes();
        });
    }

    /**
     * Define the public web routes
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web', 'cors')
             ->group(base_path('routes/web.php'));
    }

    /**
     *Define the "web portal" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapWebUserApiRoutes()
    {
        Route::prefix('web-user')
             ->middleware('assign.guard:webUser', 'web.user', 'cors', 'throttle:500,1')
             ->group(base_path('routes/roles/webUser.php'));
    }

    /**
     * Define the "common protected api" routes for the application using auth.jwt middleware.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('auth.jwt:common', 'cors')
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define the coach ROLES routes API using auth.jwt middleware.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapCoachApiRoutes()
    {
        Route::prefix('api/coach')
            ->middleware('auth.jwt:coach', 'cors', 'throttle:500,1') // This will cap requests made by an IP to 500 every 1 minutes. Next time the user hits the API from the same IP,
            ->group(base_path('routes/roles/coach.php'));
    }

    /**
     * Define the "api for the super admin portal" routes using auth.jwt middleware.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAdminApiRoutes()
    {
        Route::prefix('api/admin')
            ->middleware('auth.jwt:admin', 'cors', 'throttle:500,1') // This will cap requests made by an IP to 100 every 1 minutes. Next time the user hits the API from the same IP,
            ->group(base_path('routes/roles/admin.php'));
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
