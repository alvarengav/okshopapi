<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
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
        Schema::defaultStringLength(191);
        Validator::extend('strong_password', function ($attribute, $value, $parameters, $validator) {
            $minLength = 8;
            $uppercaseRequired = true;
            $lowercaseRequired = true;
            $numberRequired = true;
            $specialCharRequired = true;

            $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/";

            if (strlen($value) < $minLength) {
                return false;
            }

            if ($uppercaseRequired && !preg_match('/[A-Z]/', $value)) {
                return false;
            }

            if ($lowercaseRequired && !preg_match('/[a-z]/', $value)) {
                return false;
            }

            if ($numberRequired && !preg_match('/\d/', $value)) {
                return false;
            }

            if ($specialCharRequired && !preg_match('/[@$!%*?&]/', $value)) {
                return false;
            }

            return true;
        }, "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.");
    }
}
