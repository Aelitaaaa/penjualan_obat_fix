<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; 
use App\Models\Obat; 

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
        View::composer('template.navbar', function ($view) {
            $obatHampirHabis = Obat::where('jumlah_obat', '>', 0)->where('jumlah_obat', '<=', 3)->get(); 
            $obatHabis = Obat::where('jumlah_obat', '=', 0)->get(); 
            $view->with([
            'obatHampirHabis' => $obatHampirHabis,
            'obatHabis' => $obatHabis
            ]);
        });
    }
}
