@extends('admin.layouts.layouts')
@section('title')
    مدیریت دیدگاه ها
@endsection
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('admin.') }}">خانه</a></li>
        <li class="breadcrumb-item active">مدیریت دیدگاه ها</li>
    </ol>
@endsection

@section('content')
    <div class="row pr-3 pl-3 mb-2">
        <div class="clear"></div>
    </div>
    <div class="row pr-3 pl-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جدول دیدگاه ها</h3>
{{--                    <div class="card-tools">--}}
{{--                        <form action="">--}}
{{--                            <div class="input-group input-group-sm" style="width: 150px;">--}}
{{--                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو"--}}
{{--                                       value="{{ request('search') }}">--}}

{{--                                <div class="input-group-append">--}}
{{--                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>آیدی</th>
                            <th>ایمیل</th>
                            <th>نام کاربر</th>
                            <th>نام لاتین کاربر</th>
                            <td>دیدگاه</td>
                            <td>دیدگاه لاتین</td>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ $comment->email }}</td>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->en_name }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td>{{ $comment->en_comment }}</td>
                                <td>{{ jdate($comment->created_at)->format('Y/m/d') }}</td>
                                <td>
                                    <div class="btn-group">
{{--                                        <a href="{{ route('admin.comments.edit',$comment->id) }}"--}}
{{--                                           class="btn btn-primary btn-sm">ویرایش</a>--}}
                                        <a href="#" onclick="event.preventDefault();askForDelete('{{ $comment->id }}')"
                                           class="btn btn-danger btn-sm">حذف</a>
                                        @if($comment->approved)
                                            <a href="#" onclick="event.preventDefault();askForDisApproved('{{ $comment->id }}')"
                                               class="btn btn-warning btn-sm">رد کردن</a>
                                            @else
                                            <a href="#" onclick="event.preventDefault();askForApproved('{{ $comment->id }}')"
                                               class="btn btn-warning btn-sm">تایید</a>

                                            @endif
                                        <form method="post" id="delete-{{ $comment->id }}"
                                              action="{{ route('admin.comments.destroy',$comment->id) }}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <form method="post" id="approved-{{ $comment->id }}"
                                              action="{{ route('admin.comments.approved',$comment->id) }}">
                                            @csrf
                                            @method('patch')
                                        </form>
                                        <form method="post" id="disApproved-{{ $comment->id }}"
                                              action="{{ route('admin.comments.disApproved',$comment->id) }}">
                                            @csrf
                                            @method('patch')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $comments->render() }}
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
                text: "آیا از حذف این دیدگاه اطمینان دارید ؟",
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
                        title: 'دیدگاه با موفقیت حذف شد'
                    })
                }
            })
        }

        function askForApproved(id) {
            Swal.fire({
                title: '',
                text: "آیا از تایید این دیدگاه اطمینان دارید ؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید کن',
                cancelButtonText: "لغو عملیات"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('approved-' + id).submit();
                    Toast.fire({
                        icon: 'success',
                        title: 'دیدگاه با موفقیت تایید شد'
                    })
                }
            })
        }

        function askForDisApproved(id) {
            Swal.fire({
                title: '',
                text: "آیا از رد این دیدگاه اطمینان دارید ؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'رد کن',
                cancelButtonText: "لغو عملیات"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('disApproved-' + id).submit();
                    Toast.fire({
                        icon: 'success',
                        title: 'دیدگاه با موفقیت رد شد'
                    })
                }
            })
        }
    </script>

@endsection
