<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index',
            'show',
        ]]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::all();
        // dd($posts);

        return view('blog.index')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
        // Add a method with, posts order it by, updated_at in descending order, and get every post we have
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '-' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        Post::create([
            'user_id' => auth()->user()->id,
            'slug' => Str::slug($request->input('title')),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'path_image' => $newImageName,
        ]);

        return redirect('/blog')->with(['message' => 'Your post has been added']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        return view('blog.show')
            ->with('post', Post::where('slug', $slug)
                ->first());
        // We need to show that blog post, so we need to pass that in as well,
        // adding access opertator along with with() pass in one post, grab it from post where slug
        // is the same as url and we want to grab the first post
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        return view('blog.edit')
            ->with('post', Post::where('slug', $slug)
                ->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::where('slug', $slug)
            ->update([
                'slug' => Str::slug($request->input('title')),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);

        return redirect('/blog')->with(['message' => 'Your post has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/blog')->with(['message' => 'Your post has been deleted']);
    }
}
