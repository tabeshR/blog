@extends('fa.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3 col-12 mb-3">
            <div class="card text-dark bg-info my-text-dark">
                <div class="card-header">دسته بندی ها</div>
                <ul id="myUL" style="margin-right: 20px;padding:15px 0">
                    @include('fa.layouts.categories',['categories'=>\App\Models\Category::where('parent_id',null)->get()])
                </ul>
            </div>
            <div class="row my-text-dark">
                <div class="mt-3">
                    <div class="card text-dark bg-warning">
                        <div class="card-header">هشتگ ها</div>
                        <ul class="pt-3">
                            @foreach(\App\Models\Tag::all() as $tag)
                                <li style="line-height: 2;">
                                    <a href="{{ route('show.post.by.tags',$tag->id) }}">#{{ $tag->name }}</a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>

            <div class="row my-text-white">
                <div class="mt-3">
                    <div class="card text-white bg-primary">
                        <div class="card-header">آرشیو</div>
                        <ul>
                            @foreach(\App\Models\Post::select(\DB::raw('count(title) as `totalPosts`'), \DB::raw("DATE_FORMAT(created_at, '%Y') new_date"))
        ->groupby('new_date')
        ->get() as $post)
                                <li style="line-height: 2" class="{{ $loop->first ? "mt-2" : "" }}">
                                    <a href="{{ route('show.posts.by.date',$post->new_date) }}">{{ jdate($post->new_date.'-1'.'-1')->getYear() }}</a>
                                    <span class="badge bg-dark" style="border-radius: 50%;position: relative;top: -2px;right:5px">{{ $post->totalPosts }}</span>
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
                            <div class="card-header">{{ $post->title }}
                            <span class="float-end">
                                @if($post->pin)
                                    <i class="fas fa-thumbtack"></i>
                                    @endif
                            </span>
                            </div>
                            <div class="card-body">
                                <p style="text-align: justify">
                                    {!! \Str::limit($post->body,800) !!}
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            دسته بندی :
                                            <a href="{{ route('show.post.by.category',$post->category->id) }}">{{ $post->category->name }}</a>
                                        </div>
                                        <div>
                                            هشتگ ها :
                                            @forelse($post->tags as $tag)
                                                <a href="{{ route('show.post.by.tags',$tag->id) }}">#{{  $tag->name }}</a>{{ $loop->last ? ""  :"," }}
                                            @empty
                                                -
                                            @endforelse
                                        </div>
                                        <div>
                                            توسط :
                                            {{ $post->user->name }}
                                        </div>
                                        <div>
                                            تاریخ انتشار :
                                            {{ jdate($post->created_at)->format('Y/m/d') }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div style="display: flex;align-items: center;justify-content: end;height: 100%">
                                            <a href="{{ route('posts.single',$post->id) }}"
                                               class="btn btn-primary btn-sm float-end">ادامه مطلب</a>
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
                            مطلبی یافت نشد
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
