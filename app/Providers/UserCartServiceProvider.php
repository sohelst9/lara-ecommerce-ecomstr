<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class UserCartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $user = User::where('id', Auth::guard('web')->user()->id ?? '')->first();
            if ($user) {
                $user_carts = Cart::where('user_id', auth()->user()->id)->get();
                $view->with('user_carts', $user_carts);
            } else {
                return false;
            }
        });
    }
}
