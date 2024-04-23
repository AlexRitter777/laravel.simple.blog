<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){

        $request->validate([
            's' => 'required'
        ]);

        //$posts = Post::where('title', 'LIKE', "%{$request->query('s')}%")->paginate(2);
        $posts = Post::like('title', $request->query('s'))->paginate(2);

        return view('posts.search', compact('posts', 'request'));

    }
}
