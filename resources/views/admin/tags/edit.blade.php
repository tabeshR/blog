@extends('admin.layouts.layouts')
@section('title')
    ویرایش تگ
@endsection
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('admin.') }}">خانه</a></li>
        <li class="breadcrumb-item active">ویرایش تگ </li>
    </ol>
@endsection

@section('content')

    <div class="row pr-3 pl-3">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">ویرایش تگ </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('admin.tags.update',$tag->id) }}">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">نام</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$tag->name) }}" id="inputEmail3" name="name">
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
                                <input type="text" class="form-control @error('en_name') is-invalid @enderror" value="{{ old('en_name',$tag->en_name) }}" id="inputEmail3" name="en_name">
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
                        <button type="submit" class="btn btn-info">ویرایش تگ</button>
                        <a href="{{ route('admin.tags.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection



