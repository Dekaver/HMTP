<?php

namespace App\Providers;
use App\Models\Periode;
use Illuminate\Pagination\Paginator;
use App\Models\TrackUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // dd(TrackUser::all());
        View::share('trackuser', TrackUser::all());
        View::share('trackuser_currentday', TrackUser::where("date", date("Y-m-d") )->get() );
        View::share('trackuser_currentmonth', TrackUser::all()->filter(function ($value, $key){
            return substr($value->date, 0,7) == date("Y-m");
        }));
        View::share('periode', Periode::simplePaginate(4));

        Paginator::useBootstrap();
    }
}
