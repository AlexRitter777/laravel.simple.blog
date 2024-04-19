<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Front\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Tag::create($request->all());
        return redirect(route('tags.index'))->with('success', 'Tag has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $category = Tag::find($id);
        $category->update($request->all());
        return redirect(route('tags.index'))->with('success', 'Tag has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::find($id);

        if($tag->posts->count()){
            return redirect(route('tags.index'))->with('error', 'This tag belong to post and can`t be deleted!');
        }

        $tag->delete();
        return redirect(route('tags.index'))->with('success', 'Tag has been deleted!');    }
}
