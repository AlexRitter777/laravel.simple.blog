<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class MenuComposer
{


    public function compose(View $view): void
    {

        if(Cache::has('menu_categories')){

            $menuCategories = Cache::get('menu_categories');

        } else {

            $menuCategories = Category::has('posts')->get();
            Cache::put('menu_categories', $menuCategories);

        }


        $view->with('categories', $menuCategories);


    }


}
