<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View {

        $posts = Post::with('category')->orderBy('id', 'desc' )->paginate(2);

        return view('posts.index', compact('posts'));

    }

    public function show(string $slug): View {

        $post = Post::where('slug', $slug)->FirstOrFail();

        $post->views += 1 ;
        $post->update();



        return view('posts.show', compact('post'));
    }

}
