<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')
               ->simplePaginate(5);

        return view('home', compact('posts'));
    }

    public function getpage($name)
    {
        if ($name != '') {
            $page = Page::where('title', $name)->first();
            if ($page) {
                return view('page', compact('page'));
            }
        }

        return Redirect::back();
    }

    public function getpost($slug)
    {
        if ($slug != '') {
            $post = Post::where('slug', $slug)->first();
            if ($post) {
                return view('post', compact('post'));
            }
        }

        return Redirect::back();
    }
}
