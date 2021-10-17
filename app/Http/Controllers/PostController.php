<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Inertia\Inertia;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index()
    {
        request()->validate([
            'direction' => ['in:asc,desc'],
            'field' => ['in:created_at']
        ]);

        $query = Post::query();

        if (request('search')) {
            $query->where('title', 'LIKE', '%'.request('search').'%');
        }

        if(request('tags')){
            $query->whereHas('tags', function($tag){
                $tag->where('name', request('tags'));
            });
        }

        if (request()->has(['field', 'direction'])) {
            $query->orderBy(request('field'), request('direction'));
        }else{
            $query->orderBy('created_at', 'desc');
        }

        return Inertia::render('Post/Index', [
            'posts' => $query->paginate(5)->withQueryString(),
            'filters' => request()->all(['search', 'field', 'direction', 'tags'])
        ]);
    }

    public function show(Post $post)
    {
        return Inertia::render('Post/Show', [
            'post' => $post,
        ]);
    }

    public function store(PostRequest $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
            'slug' => $request->slug,
        ]);
        $post->tags()->sync($request->tags);
        return Redirect::route('posts.index')->with('message', 'Post success created');
    }

    public function create()
    {
        return Inertia::render('Post/Create', [
            'tags' => Tag::all(),
        ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        if($post->trashed()){
            return Redirect::route('posts.index')->with('message', 'One post is gone');
        }
    }
}
