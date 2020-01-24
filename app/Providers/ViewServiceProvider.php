<?php

namespace App\Providers;

use App\Models\Admin\Category;
use App\Models\Admin\Content;
use App\Models\Variable;
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
        view()->composer('partials._join-community', function ($view) {
            $variableData = Variable::select('key', 'value')
                ->where('key', 'join-community-header')
                ->orWhere('key', 'join-community-text')
                ->get();

            foreach($variableData as $data) {
                $variables[$data->key] = $data->value;
            }

            $view->with(compact('variables'));
        });
    }
}
