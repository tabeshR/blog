@extends('admin.layouts.layouts')
@section('title')
    مدیریت پست ها
@endsection
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('admin.') }}">خانه</a></li>
        <li class="breadcrumb-item active">مدیریت پست ها</li>
    </ol>
@endsection

@section('content')
    <div class="row pr-3 pl-3 mb-2">
        <div class="col">
            <a class="btn btn-sm btn-primary float-left" href="{{ route('admin.posts.create') }}">ایجاد پست جدید</a>
        </div>
        <div class="clear"></div>
    </div>
    <div class="row pr-3 pl-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جدول پست ها</h3>
                    <div class="card-tools">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو"
                                       value="{{ request('search') }}">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>آیدی</th>
                            <th>دسته بندی</th>
                            <th>عنوان</th>
                            <th>متن</th>
                            <th>تاریخ انتشار</th>
                            <th>تاریخ ایجاد</th>
                            <th>سنجاق</th>
                            <th>عملیات</th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ \Str::limit($post->body,20) }}</td>
                                <td>{{ $post->published_at ? jdate($post->published_at)->format('Y/m/d') : "زمان ایجاد" }}</td>
                                <td>{{ jdate($post->created_at)->format('Y/m/d') }}</td>
                                <td>
                                    @if($post->pin)
                                        <i class="fa fa-check text-success"></i>
                                        @else
                                    <i class="fa fa-times text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.posts.edit',$post->id) }}"
                                           class="btn btn-primary btn-sm">ویرایش</a>
                                        <a href="#" onclick="event.preventDefault();askForDelete('{{ $post->id }}')"
                                           class="btn btn-danger btn-sm">حذف</a>
                                        <form method="post" id="delete-{{ $post->id }}"
                                              action="{{ route('admin.posts.destroy',$post->id) }}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $posts->appends(['search'=>request('search')])->render() }}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection


@section('script')
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-left',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        function askForDelete(id) {
            Swal.fire({
                title: '',
                text: "آیا از حذف این پست اطمینان دارید ؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'حذف کن',
                cancelButtonText: "لغو عملیات"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-' + id).submit();
                    Toast.fire({
                        icon: 'success',
                        title: 'پست با موفقیت حذف شد'
                    })
                }
            })
        }
    </script>

@endsection
