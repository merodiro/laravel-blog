<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use TCG\Voyager\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Cache::remember('posts', 60, function () {
            return Post::orderBy('created_at', 'desc')
                ->simplePaginate(5);
        });

        return $posts;
    }
}
