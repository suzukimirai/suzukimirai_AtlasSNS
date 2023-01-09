<?php

namespace App\Providers;

use App\Post;
use View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\ViewComposer;

class ComposerSeriviceProvider extends ServiceProvider
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
        //
        view::share('posts', Post::get());
    }
}
