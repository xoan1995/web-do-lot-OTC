<?php

namespace App\Providers;

use App\Footer;
use App\Http\View\Composers\ThemesComposer;
use App\Logo;
use App\Map;
use App\Partner;
use App\Social;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceView extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'frontend.*',ThemesComposer::class
        );
        View::composer(
            'frontend.partials.footer', function ($view){
                $view->with('logo',Logo::all());
                $view->with('partner',Partner::orderBy('sort_by','ASC')->get());
                $view->with('social',Social::orderBy('sort_by','ASC')->get());
                $view->with('footer',Footer::all());
            }
        );
        View::composer(
            'frontend.partials.header', function ($view) {
                $view->with('maps',Map::FirstOrFail());
        });
    }
    }
