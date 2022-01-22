@extends('en.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3 col-12 mb-3">
            <div class="card text-dark bg-info my-text-dark">
                <div class="card-header">Categories</div>
                <ul id="myUL" style="margin-left: 20px;padding:15px 0">
                    @include('en.layouts.categories',['categories'=>\App\Models\Category::where('parent_id',null)->get()])
                </ul>
            </div>
            <div class="row my-text-dark">
                <div class="mt-3">
                    <div class="card text-dark bg-warning">
                        <div class="card-header">Hashtags</div>
                        <ul class="pt-3">
                            @foreach(\App\Models\Tag::all() as $tag)
                                <li style="line-height: 2;">
                                    <a href="{{ route('show.post.by.tags',[$tag->id,'lang'=>'en']) }}">#{{ $tag->en_name }}</a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>

            <div class="row my-text-white">
                <div class="mt-3">
                    <div class="card text-white bg-primary">
                        <div class="card-header">Archive</div>
                        <ul>
                            @foreach(\App\Models\Post::select(\DB::raw('count(title) as `totalPosts`'), \DB::raw("DATE_FORMAT(created_at, '%Y') new_date"))
        ->groupby('new_date')
        ->get() as $post)
                                <li style="line-height: 2" class="{{ $loop->first ? "mt-2" : "" }}">
                                    <a href="{{ route('show.posts.by.date',[$post->new_date,'lang'=>'en']) }}">{{ $post->new_date }}</a>
                                    <span class="badge bg-dark" style="border-radius: 50%;position: relative;top: 0px;left:5px">{{ $post->totalPosts }}</span>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-9 col-12">
            @forelse($posts as $post)

                <div class="row">
                    <div class="col mb-3">
                        <div class="card border-primary">
                            <div class="card-header">{{ $post->en_title }}
                            <span class="float-end">
                                @if($post->pin)
                                    <i class="fas fa-thumbtack"></i>
                                    @endif
                            </span>
                            </div>
                            <div class="card-body">
                                <p style="text-align: justify">
                                    {!! \Str::limit($post->en_body,800) !!}
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            categories :
                                            <a href="{{ route('show.post.by.category',[$post->category->id,'lang'=>'en']) }}">{{ $post->category->en_name }}</a>
                                        </div>
                                        <div>
                                            hashtags :
                                            @forelse($post->tags as $tag)
                                                <a href="{{ route('show.post.by.tags',[$tag->id,'lang'=>'en']) }}">#{{  $tag->en_name }}</a>{{ $loop->last ? ""  :"," }}
                                            @empty
                                                -
                                            @endforelse
                                        </div>
                                        <div>
                                            by :
                                            {{ $post->user->en_name }}
                                        </div>
                                        <div>
                                            created_date :
                                            {{ $post->created_at }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div style="display: flex;align-items: center;justify-content: end;height: 100%">
                                            <a href="{{ route('posts.single',[$post->id,'lang'=>'en']) }}"
                                               class="btn btn-primary btn-sm float-end">more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="row">
                    <div class="col mb-3">
                        <div class="alert alert-danger">
                           There is no posts
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{ $posts->render() }}
        </div>
    </div>

@endsection
