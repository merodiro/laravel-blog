@extends('layouts.app')

@section('content')

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>{{ Voyager::setting('title') }}</h1>
                        <hr class="small">
                        <span class="subheading">{{ Voyager::setting('description') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @foreach ($posts as $post)
                    <div class="post-preview">
                        <a href="{{ url('/posts/'.$post->slug) }}">
                            <h2 class="post-title">
                                {{ $post->title }}
                            </h2>
                            <h3 class="post-subtitle">
                                {{ $post->excerpt }}
                            </h3>
                        </a>
                        <p class="post-meta">Posted by <a href="#">{{ \App\User::find($post->author_id)->name }}</a> {{ $post->created_at->diffForHumans() }}</p>
                    </div>
                <hr>
                @endforeach
                <!-- Pager -->
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
