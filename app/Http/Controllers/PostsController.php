<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index ()
    {
        return 'index page';
    }


    public function store()
    {
        request()->validate([
        'title' => 'required',
            ]);

        Post::create([
            'title' => 'title',
            'category' => '1',
            'genre' => 'horror',
        ]);
    }

    public function update(Post $post)
    {
        $post->update($this->validateRequest());
    }


    public function validateRequest()
    {
        return request()->validate([
        'title' => 'required',
        'category' => 'required',
        'genre' => 'required',
        ]);
    }
}
