<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */ 
    public function boot(): void
    {
        Paginator::useBootstrap();


        view()->composer('*', function ($view) {
            $view->with('user', User::where('id', Auth::id())->first());
        });


        Blade::directive('route', function ($expression) {
            return "<?php echo route ($expression); ?>";
        });
    }
}
