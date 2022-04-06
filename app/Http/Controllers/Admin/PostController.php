<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('admin.posts.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *  @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required', 'unique:posts', 'string', 'min:3', 'max:50'],
            'image' => ['string', 'min:10'],
            'content' => ['required', 'string', 'min:10'],
        ]);

        $data = $request->all();

        $post = new Post();
        if (array_key_exists('is_published', $data)) {
            $post->is_published = 1;
        } else {
            $post->is_published = 0;
        }
        $post->slug = Str::slug($post->title, '-');

        $post->fill($data);
        $post->save();

        return redirect()->route('admin.posts.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required', Rule::unique('posts')->ignore($post->id), 'string', 'min:3', 'max:50'],
            'image' => ['string', 'min:10'],
            'content' => ['required', 'string', 'min:10'],
        ]);

        $data = $request->all();
        if (array_key_exists('is_published', $data)) {
            $post->is_published = true;
        }
        $post->slug = Str::slug($post->title, '-');

        $post->update($data);

        return redirect()->route('admin.posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('message', "$post->title eliminato con successo")->with('type', "success");
    }
    public function toggle(Post $post)
    {
        $post->is_published = !$post->is_published;
        $post->save();
        return redirect()->route('admin.posts.index')->with('message', "$post->title pubblicato con successo")->with('type', "success");
    }
}
