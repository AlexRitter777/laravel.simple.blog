<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{

    public function show(string $slug) /*: View*/ {

        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = $category->posts()->orderBy('id', 'desc')->paginate(3);

        return view('categories.show', compact('category', 'posts'));



    }


}
