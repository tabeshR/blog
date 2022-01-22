@extends('fa.layouts.app')
@section('content')

    <div class="row">
        <div class="col my-3">
            <div class="card border-primary">
                <div class="card-header">{{ $post->title }}</div>
                <div class="card-body">
                    <p style="text-align: justify">
                       {!! $post->body !!}
                    </p>
                </div>
                <div class="card-footer">
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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col my-3">
            <h5 class="float-start">دیدگاه ها</h5>
            <a href="" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">ارسال
                دیدگاه</a>
            <div class="clear"></div>
            @forelse($post->comments()->where('approved',1)->where('lang','fa')->latest()->get() as $comment)
                <div class="card mt-3">
                    <div class="card-header">
                        {{ $comment->name }}
                        <span class="text-muted float-end">{{ jdate($comment->created_at)->ago() }}</span>
                    </div>
                    <div class="card-body">
                        {{ $comment->comment }}
                    </div>
                </div>
            @empty
                <div class="alert alert-danger mt-3">
                    تا این لحظه دیدگاهی برای این پست ارسال نشده است
                </div>
            @endforelse
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ارسال دیدگاه</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('comments.send') }}" method="post">
                    @csrf
                    <input type="hidden" name="lang" value="fa">
                <div class="modal-body">
                    <input type="hidden" name="commentable_id" value="{{ $post->id }}">
                    <input type="hidden" name="commentable_type" value="{{ get_class($post) }}">
                        <div class="form-group">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="">نام</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="">ایمیل</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="">دیدگاه</label>
                                    <textarea class="form-control" name="comment" id="" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">ارسال</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
