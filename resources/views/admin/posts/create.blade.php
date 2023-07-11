@extends('admin.layouts.app')
@section('title')
    پست جدید
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">خانه</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">مدیریت پست ها</a></li>
    <li class="breadcrumb-item active">پست جدید</li>
@endsection
@section('content')

    <div class="row">
        <div class="col">
            <form action="{{ route('admin.posts.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="">عنوان</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
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
                            <select name="category_id" id="" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="0">انتخاب کنید</option>
                                @foreach($categories as $category)
                                    <option
                                        {{ old('category_id') == $category->id ? "selected"  :"" }}
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
                            <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror"></textarea>
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
                            <select name="confirmed" id="" class="form-control @error('confirmed') is-invalid @enderror">
                                <option value="1">فعال</option>
                                <option value="0">غیر فعال</option>
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
                            <button class="btn btn-primary btn-sm" type="submit">ثبت</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
