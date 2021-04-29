<?php

namespace App\Providers;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Http\ViewComposers\{CategoryComposer,RoleComposer,CommentComposer ,PageComposer};
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
        
        View::composer(['partials.sidebar','index','lists.categories'], CategoryComposer::class);
        View::composer(['lists.roles'], RoleComposer::class);
        View::composer(['partials.sidebar'], CommentComposer::class);
        View::composer(['partials.navbar'], PageComposer::class);
        \Blade::if('admin', function () {
            return auth()->check() && auth()->user()->isAdmin();
        });
        
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line('Click the button below to verify your email address.')
                ->action('Verify Email Address', $url);
        });

        //View::share('key', \App\Models\Category::get());
    }
}
