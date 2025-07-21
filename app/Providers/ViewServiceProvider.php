<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $roleId = Auth::user()->role_id;
                $menus = Menu::whereHas('roles', function ($query) use ($roleId) {
                    $query->where('roles.id', $roleId);
                })->orderBy('order')->get();

                $view->with('menus', $menus);
            }
        });
    }

    public function register()
    {
        //
    }
}
