<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class MenuComposer
{

    /*public function __construct(
        protected Category $category,
    ) {}*/

    public function compose(View $view): void
    {
        $categories = Category::all();


        $view->with('categories', $categories);
    }


}
