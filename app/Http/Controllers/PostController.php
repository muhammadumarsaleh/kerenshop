<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\PostRequest;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('pages.admin.post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $request->request->add(['slug' => Str::slug($request->title, '-')]);
        $request->request->add([
            'excerpt' =>
            Str::words($request->content, 10)
        ]);
        $post = Post::create($request->all());
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('images');
            $post->picture = $path;
            $post->save();


            return Redirect::route('post.index')->with('sukses', 'Postingan berhasil ditambahkan');
        }

        // tampilkan error perintah masukkan gambar

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('pages.admin.post.edit', [
            'item' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $pathpoto = $post->picture;
        if ($pathpoto != null || $pathpoto != '') {
            Storage::delete($pathpoto);
        }
        $post->update($request->all());
        $post['slug'] = Str::slug($request->title, '-');
        $post['excerpt'] =Str::words($request->content, 10);
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('images');
            $post->picture = $path;
            $post->save();
        }

        return redirect::route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $pathpoto = $post->picture;
        if ($pathpoto != null || $pathpoto != '') {
            Storage::delete($pathpoto);
        }
        $post->delete();

        return redirect()->route('post.index');
    }
}

