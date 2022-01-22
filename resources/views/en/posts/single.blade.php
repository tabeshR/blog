@extends('en.layouts.app')
@section('content')

    <div class="row">
        <div class="col my-3">
            <div class="card border-primary">
                <div class="card-header">{{ $post->en_title }}</div>
                <div class="card-body">
                    <p style="text-align: justify">
                       {!! $post->en_body !!}
                    </p>
                </div>
                <div class="card-footer">
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
                        {{$post->created_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col my-3">
            <h5 class="float-start">comments</h5>
            <a href="" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">send comment
                </a>
            <div class="clear"></div>
            @forelse($post->comments()->where('approved',1)->where('lang','en')->latest()->get() as $comment)
                <div class="card mt-3">
                    <div class="card-header">
                        {{ $comment->en_name }}
                        <span class="text-muted float-end">{{ $comment->created_at }}</span>
                    </div>
                    <div class="card-body">
                        {{ $comment->en_comment }}
                    </div>
                </div>
            @empty
                <div class="alert alert-danger mt-3">
                   There is no comments yet
                </div>
            @endforelse
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">send comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('comments.send') }}" method="post">
                    @csrf
                    <input type="hidden" name="lang" value="en">
                <div class="modal-body">
                    <input type="hidden" name="commentable_id" value="{{ $post->id }}">
                    <input type="hidden" name="commentable_type" value="{{ get_class($post) }}">
                        <div class="form-group">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="">name</label>
                                    <input type="text" name="en_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="">email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="">comment</label>
                                    <textarea class="form-control" name="en_comment" id="" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">send</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
