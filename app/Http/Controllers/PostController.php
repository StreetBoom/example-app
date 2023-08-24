<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Http\Requests\PostRequest;
use App\Mail\ContactForm;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends BaseController
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $this->authorize('create', auth()->user());
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $this->authorize('create', auth()->user());
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {

        $posts = Post::all();
        $comments = Comment::all();
        return view('posts.show', [
            'posts' => $posts,
            'post' => $post,
            'comments' => $comments,
        ]);
    }

    public function edit(Post $post)
    {

        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $data = $request->validated();
        $this->service->update($post, $data);

        return redirect()->route('posts.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index', compact('post'));
    }

    public function commentForm(Request $request)
    {
        $data = $request->validate([
            'post_id' => 'required',
            'text' => 'required|string|min:5'
        ]);
        $data['user_id'] = auth()->user()->id;

        Comment::create($data);

        return redirect(route('posts.show', $data['post_id']));
    }


    public function showContactForm($formData)
    {
        return view('contact');
    }

    public function contactForm()
    {
        Mail::to('StreetBoomss@yandex.ru')->send(new ContactForm($request->validated([])));
        return redirect(view('posts.index'));
    }
}
