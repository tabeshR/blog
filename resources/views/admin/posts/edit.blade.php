@extends('admin.layouts.app')
@section('title')
    ویرایش پست
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">خانه</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">مدیریت پست ها</a></li>
    <li class="breadcrumb-item active">ویرایش پست</li>
@endsection
@section('content')

    <div class="row">
        <div class="col">
            <form action="{{ route('admin.posts.update',$post->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="">عنوان</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                   value="{{ old('title',$post->title) }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="">دسته بندی</label>
                            <select name="category_id" id=""
                                    class="form-control @error('category_id') is-invalid @enderror">
                                <option value="0">انتخاب کنید</option>
                                @foreach($categories as $category)
                                    <option
                                        {{ $post->category_id == $category->id ? "selected"  :"" }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="">پست</label>
                            <textarea name="body" id="" cols="30" rows="10"
                                      class="form-control @error('body') is-invalid @enderror">{{ $post->body }}</textarea>
                            @error('body')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="">وضعیت</label>
                            <select name="confirmed" id=""
                                    class="form-control @error('confirmed') is-invalid @enderror">
                                <option value="1" {{ $post->confirmed ? "selected"  :"" }}>فعال</option>
                                <option value="0" {{ !$post->confirmed ? "selected"  :"" }}>غیر فعال</option>
                            </select>
                            @error('confirmed')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary btn-sm" type="submit">بروزرسانی</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
