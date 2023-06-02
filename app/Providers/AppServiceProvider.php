<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::directive('money', function ($amount) {

            $value = ((int) $amount) / 100;
            if ($value !== ceil($value))
                $value = number_format($value, 2);
            return "<?php echo $value; ?>";
        });
    }
}
