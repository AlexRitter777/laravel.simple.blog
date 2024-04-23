<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagController extends Controller
{

    public function show(string $slug) /*: View*/ {

        $tag = Tag::where('slug', $slug)->firstOrFail();

        $posts = $tag->posts()->orderBy('id', 'desc')->paginate(3);

        return view('tags.show', compact('tag', 'posts'));




    }


}
