<?php

namespace App\Sevices\Post;

use App\Http\Requests\PostRequest;
use App\Models\Post;

class Services
{
    public function store($data)
    {
        Post::create($data);
    }
    public function update($post,$data)
    {
        $post->update($data);
    }
}
