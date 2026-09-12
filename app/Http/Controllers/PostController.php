<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Post;




//投稿一覧を表示するためのコントローラー
class PostController extends Controller
{
    //投稿一覧ページの表示
    public function index(): View
    {
        $posts = Post::latest()->get();
        return view('posts.index', ['posts' => $posts]);
    }

    //投稿作成ページの表示
    public function create(): View
    {
        return view('posts.create');
    }


    //投稿作成ページから投稿
    public function store(Request $request): RedirectResponse
    {
        Post::create([
            'title' => $request->title,
            'content' => $request->input('content'),
            'published_at' => now(),
        ]);

        return redirect('/posts');
    }

    //投稿編集ページの表示
    public function edit($id): View
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }


    //投稿を編集
    public function update(Request $request,$id): RedirectResponse
    {
        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->input('content'),
        ]);
        return redirect('/posts');
    }

    //投稿を削除
    public function delete($id): RedirectResponse
    {
        Post::findOrFail($id)->delete();
        return redirect('/posts');
    }

    public function trashed(): View
    {
        $posts = Post::onlyTrashed()->latest('deleted_at')->get();

        return view('posts.trashed', ['posts' => $posts]);
    }
}


