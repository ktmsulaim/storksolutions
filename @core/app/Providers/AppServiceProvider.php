<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use App\Blog;
use App\Language;
use App\Menu;
use App\SocialIcons;
use App\SupportInfo;

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
        Schema::defaultStringLength(191);


        View::composer(['*'], function ($view) {
            $lang = !empty(session()->get('lang')) ? session()->get('lang') : Language::where('default',1)->first()->slug;
            $all_social_item = SocialIcons::all();
            $all_support_item = SupportInfo::all();
            $all_usefull_links = Menu::find(get_static_option('useful_link_'.get_user_lang().'_widget_menu_id'));
            $all_important_links = Menu::find(get_static_option('important_link_'.get_user_lang().'_widget_menu_id'));
            $all_recent_post = Blog::where('lang' , Session::get('lang'))->orderBy('id', 'DESC')->take(get_static_option('recent_post_widget_item'))->get();
            $all_language = Language::all();
            $primary_menu = Menu::where(['status' => 'default' ,'lang' => $lang])->first();

            $view->with('all_usefull_links', $all_usefull_links);
            $view->with('all_important_links', $all_important_links);
            $view->with('all_recent_post', $all_recent_post);
            $view->with('all_support_item', $all_support_item);
            $view->with('all_social_item', $all_social_item);
            $view->with('all_language', $all_language);
            $view->with('primary_menu', $primary_menu);
        });
    }
}
