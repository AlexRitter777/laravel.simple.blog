<?php

namespace App\View\Composers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SideBarComposer
{


    public function compose(View $view): void
    {

        $sideBarPosts = Post::orderBy('views', 'desc')->limit(5)->get();

        $sideBarCategories = Category::has('posts')->withCount('posts')->get();

        $view->with(['posts' => $sideBarPosts, 'categories' => $sideBarCategories]);

    }



}
