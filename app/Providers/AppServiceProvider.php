<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro(
            'errorJson',
            function($error, $data = null, $statusCode = 500) {
                $wrapped = [
                    'ok' => false,
                    'error' => $error
                ];
                if (!is_null($data)) {
                    $wrapped['data'] = $data;
                }
                return response()->json($wrapped, $statusCode);
            }
        );
    }
}
