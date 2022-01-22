@extends('admin.layouts.layouts')
@section('title')
    افزودن پست جدید
@endsection
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('admin.') }}">خانه</a></li>
        <li class="breadcrumb-item active">افزودن پست جدید</li>
    </ol>
@endsection

@section('content')

    <div class="row pr-3 pl-3">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">افزودن پست جدید</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('admin.posts.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">دسته بندی</label>

                            <div class="col-sm-10">
                                <select name="category_id" id=""
                                        class="form-control @error('category_id') is-invalid @enderror">
                                    @foreach(\App\Models\Category::all() as $cat)
                                        <option
                                            value="{{ $cat->id }}">{{ $cat->name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">موضوع</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       value="{{ old('title') }}" id="inputEmail3" name="title">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">موضوع لاتین</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('en_title') is-invalid @enderror"
                                       value="{{ old('en_title') }}" id="inputEmail3" name="en_title">
                                @error('en_title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">بدنه</label>

                            <div class="col-sm-10">
                                <textarea name="body" id="body" cols="30" rows="10"
                                          class="form-control @error('body') is-invalid @enderror">{{ old('body') }}</textarea>
                                @error('body')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">بدنه (لاتین)</label>

                            <div class="col-sm-10">
                                <textarea name="en_body" id="en_body" cols="30" rows="10"
                                          class="form-control @error('en_body') is-invalid @enderror">{{ old('en_body') }}</textarea>
                                @error('en_body')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">تگ ها</label>

                            <div class="col-sm-10">
                                <div class="row">
                                    @foreach(\App\Models\Tag::all() as $tag)
                                        <div class="col-3">
                                            <input type="checkbox" name="tags[]" id="{{ $tag->id }}"
                                                   value="{{ $tag->id }}">
                                            <label for="{{ $tag->id }}">{{ $tag->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>انتخاب تاریخ:</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </span>
                                </div>
                                <input name="published_at"
                                       class="normal-example form-control pwt-datepicker-input-element @error('published_at') is-invalid @enderror">
                                @error('published_at')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- /.input group -->
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="checkbox" name="pin" id="pin">
                                <label for="pin">سنجاق شود (pin)</label>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ایجاد پست</button>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(function () {
            $('.normal-example').persianDatepicker({
                format: 'YYYY/MM/DD',
                minDate: (new persianDate().add('day', 1).valueOf()),
                initialValue: false
            });
        })
    </script>

    <script>
        CKEDITOR.replace('body', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
        CKEDITOR.replace('en_body', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
    </script>

@endsection
