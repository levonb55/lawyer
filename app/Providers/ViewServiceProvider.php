<?php

namespace App\Providers;

use App\Models\Admin\Category;
use App\Models\Admin\Content;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        view()->composer('site.welcome', function ($view) {
            $first_content = Content::where('name','home_first')->first();
            $second_content = Content::where('name','home_second')->first();
            $third_content = Content::where('name','home_third')->first();
            $view->with(compact('first_content','second_content','third_content'));
        });
        view()->composer('site.about', function ($view) {
            $first_content = Content::where('name','about_first')->first();
            $second_content = Content::where('name','about_second')->first();
            $third_content = Content::where('name','about_third')->first();
            $view->with(compact('first_content','second_content','third_content'));
        });
        view()->composer('site.terms', function ($view) {
            $terms = Content::where('name','terms')->get();
            $view->with(compact('terms'));
        });
        view()->composer('site.privacy', function ($view) {
            $privacy = Content::where('name','privacy')->get();
            $view->with(compact('privacy'));
        });
        view()->composer('site.lawyers', function ($view) {
            $categories = Category::get();
            $view->with(compact('categories'));
        });
    }
}
