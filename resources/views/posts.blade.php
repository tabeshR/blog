@extends('layouts.app')
@section('content')
    @include('includes.bestPost')
    <div class="row g-5 mt-3">
        <div class="col-md-8">
            @foreach($posts as $post)
                <article class="blog-post">
                    <h2 class="blog-post-title">{{ $post->title }}</h2>
                    <p class="blog-post-meta">{{ enToFa(jdate($post->created_at)->format('%d %B %Y')) }} نوشته : <a
                            href="#">{{ $post->user->name }}</a></p>
                    <p style="text-align: justify">
                        {{ \Illuminate\Support\Str::limit($post->body,500) }}
                    </p>
                    <a href="{{ route('post',$post->id) }}">{{ __('Continue reading...') }}</a>
                </article>
            @endforeach
            {{ $posts->render() }}
        </div>
        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                @include('includes.about')

                <div class="p-4">
                    @include('includes.Archive')
                </div>

                <div class="p-4">
                    @include('includes.socials')
                </div>
            </div>
        </div>
    </div>
@endsection