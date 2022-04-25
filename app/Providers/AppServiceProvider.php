<?php

namespace App\Providers;

use App\Models\Exam;
use Illuminate\Support\Facades\View;
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
        View::creator(['questions.index','questions.index_action'], function ($view) {
            $view->with('exams', Exam::all());
        });
    }
}
