@extends('admin.layouts.layouts')
@section('title')
    ویرایش دسته
@endsection
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('admin.') }}">خانه</a></li>
        <li class="breadcrumb-item active">ویرایش دسته </li>
    </ol>
@endsection

@section('content')

    <div class="row pr-3 pl-3">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">ویرایش دسته </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('admin.categories.update',$category->id) }}">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">نام والد</label>

                            <div class="col-sm-10">
                                <select name="parent_id" id="" class="form-control @error('parent_id') is-invalid @enderror">
                                    <option value="{{ null }}">بدون والد</option>
                                    @foreach(\App\Models\Category::all() as $cat)
                                        <option
                                            {{ $cat->id == $category->parent_id ? "selected"  :"" }}
                                            value="{{ $cat->id }}">{{ $cat->name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('parent_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">نام</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$category->name) }}" id="inputEmail3" name="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">نام لاتین</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('en_name') is-invalid @enderror" value="{{ old('en_name',$category->en_name) }}" id="inputEmail3" name="en_name">
                                @error('en_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ویرایش دسته</button>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection



