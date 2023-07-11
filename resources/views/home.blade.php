@extends('layouts.app')
@section('content')
    @include('includes.bestPost')

    <div class="row mb-2">
        @foreach($categories as $category)
            @php
                $cat_posts = collect();
                $post_count = $category->posts->count() - 1;
                $cat_posts->put('posts', $category->posts[random_int(0, $post_count)]);
            @endphp
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">{{ $category->name }}</strong>
                        <h3 class="mb-0">{{ $cat_posts['posts']['title'] }}</h3>
                        <div
                            class="mb-1 text-muted">{{ enToFa(jdate($cat_posts['posts']['created_at'])->format('%A, %d %B %Y')) }}</div>
                        <p class="card-text mb-auto">{{ \Illuminate\Support\Str::limit( $cat_posts['posts']['body'],100)  }}</p>
                        <a href="{{ route('post',$cat_posts['posts']['id']) }}">{{ __('Continue reading...') }}</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                             role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                             focusable="false"><title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"/>
                            <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row g-5">
        <div class="col-md-8">
            @include('includes.posts')
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
