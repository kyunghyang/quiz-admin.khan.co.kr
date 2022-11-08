<?php

namespace App\Providers;

use App\Nova\Metrics\AmountCalcuations;
use App\Nova\Metrics\OrderPerDay;
use App\Nova\Metrics\LatestApplications;
use App\Nova\Metrics\PayPerDay;
use App\Nova\Metrics\PriceOrders;
use App\Nova\Metrics\RequestsPerCategory;
use App\Nova\Metrics\ResultPerDay;
use App\Nova\Metrics\TopDietProducts;
use App\Nova\Metrics\TopSingleProducts;
use App\Nova\Metrics\TotalVisits;
use App\Nova\Metrics\TotalWaitOutgoings;
use App\Nova\Metrics\TotalContacts;
use App\Nova\Metrics\TotalJobs;
use App\Nova\Metrics\TotalResults;
use App\Nova\Metrics\TotalWaitApplications;
use App\Nova\Metrics\TotalWaitPoints;
use App\Nova\Metrics\TotalWaitQnas;
use App\Nova\Metrics\TotalWaitResults;
use App\Nova\Metrics\TotalRequests;
use App\Nova\Metrics\TotalUsers;
use App\Nova\Metrics\TotalWaitWithdraws;
use App\Nova\Metrics\UsersPerDay;
use App\Nova\Metrics\WaitingQuestions;
use ClassicO\NovaMediaLibrary\NovaMediaLibrary;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            /* if($user->email == "ssa4141@naver.com")
                return true;
            */
            if(!$user->master){
                Auth::logout();

                return redirect("/login");
            }

            return $user->master;
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            // new Help,

            /*(new TotalWaitOutgoings()),
            (new TotalUsers()),*/
            /*(new PayPerDay())->width("full"),
            (new OrderPerDay())->width("full"),*/
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            // new NovaMediaLibrary()
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Nova::sortResourcesBy(function ($resource) {
            return $resource::$priority ?? 99999;
        });
    }
}
