<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
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
        View::composer('*', function ($view) {
            $etapes = DB::select('SELECT * FROM etape');
            $view->with('etapes', $etapes);
        });

    
        View::composer('*', function ($view) {
            $idequipe = session('idequipe');
            $coureurs = DB::select('SELECT * FROM viewequipecoureur WHERE idequipe = ?', [$idequipe]);
            $view->with('coureurs', $coureurs);
        });

        //  View::composer('*', function ($view) {
        //     $idequipe = session('idequipe');
        //     $coureurs = DB::select('SELECT * FROM viewequipecoureur WHERE idequipe = ?', [$idequipe]);
        //     $view->with('coureurs', $coureurs);
        // });

        
        View::share('idequipe', function() {
            return session('idequipe');
        });
    }
}
