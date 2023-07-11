@extends('admin.layouts.app')
@section('title')
    مدیریت پست ها
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">خانه</a></li>
    <li class="breadcrumb-item active">مدیریت پست ها</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <a href="{{ route('admin.posts.create') }}"><i class="fas fa-plus-circle text-primary mb-4"
                                                           title="پست جدید"></i></a>
            &nbsp;|&nbsp;
            <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" title="فیتلر و سرچ">
                <i class="fas fa-filter mb-4 text-dark"></i>
            </a>
           @include('admin.includes.filterPosts')
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center">ردیف</th>
                    <th class="text-center">عنوان</th>
                    <th class="text-center">دسته بندی</th>
                    <th class="text-center">تاریخ انتشار</th>
                    <th class="text-center">وضعیت</th>
                    <th class="text-center">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td class="text-center">{{ $loop->index+1 }}</td>
                        <td class="text-center">{{ $post->title }}</td>
                        <td class="text-center">{{ $post->category->name }}</td>
                        <td class="text-center">{{ jdate($post->created_at)->format('Y-m-d') }}</td>
                        <td class="text-center">
                            @if($post->confirmed)
                                <i class="fas fa-check text-success"></i>
                            @else
                                <i class="fas fa-times-circle text-danger"></i>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.posts.edit',$post->id) }}">
                                <i class="fas fa-pencil text-primary"></i>
                            </a>
                            &nbsp;|&nbsp;
                            <a href="#" onclick="event.preventDefault();deletePost('{{ $post->id }}')">
                                <i class="fas fa-trash text-danger"></i>
                            </a>
                            <form action="{{ route('admin.posts.destroy',$post->id) }}" method="post"
                                  id="deleteForm-{{ $post->id }}">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $posts->render() }}
        </div>
    </div>
@endsection
@section('script')
    <script>
        function deletePost(id) {
            Swal.fire({
                text: "آیا از حذف این پست مطمئن هستید ؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله حذفش کن',
                cancelButtonText: "خیر"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm-' + id).submit();
                }
            })
        }
    </script>
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": true,
            "newestOnTop": false,
            "progressBar": true,
            "rtl" : true,
            "positionClass": "toast-bottom-center",
            "preventDuplicates": true,
            "showDuration": "3000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        @if(session()->has('delete-success'))
        toastr.success('عملیات حذف با موفقیت انجام شد');
        @endif
        @if(session()->has('insert-success'))
        toastr.success('عملیات افزودن با موفقیت انجام شد');
        @endif
        @if(session()->has('update-success'))
        toastr.success('عملیات ویرایش با موفقیت انجام شد');
        @endif
    </script>
@endsection
