<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Category;
use App\Product;
use Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       View::composer('frontEnd.includes.menu',function($view){
        $publishedCategory = Category::where('publication_status',1)->get();
        $view->with('publishedCategory',$publishedCategory);
       });

       View::composer('frontEnd.home.homeContent',function($mens){
        $mensOffer = Product::where('publication_status',1)->where('categoryId',2)->get();
        $womenOffer = Product::where('publication_status',1)->where('categoryId',4)->get();
        $mens->with(['mensOffer'=>$mensOffer, 'womenOffer'=>$womenOffer]);
       });

     



      
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
