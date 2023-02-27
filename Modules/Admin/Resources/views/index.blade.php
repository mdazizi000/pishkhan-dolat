@extends('admin::layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>عملیات مدیران</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if ($errors->any())

                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif

                @if(\Illuminate\Support\Facades\Session::has('message'))
                    <div class="alert alert-success">
                        {{\Illuminate\Support\Facades\Session::get('message')}}
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">افزودن مدیر </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body  p-0">
                                <!-- form start -->
                                <form action="{{route('admins.store')}}" method="POST" role="form" >
                                    @csrf
                                    <div class="card-body">
                                       <div class="row">
                                           <div class="col-6 form-group">
                                               <label for="exampleInputName">نام و نام خانوادگی</label>
                                               <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="نام نام خانوادگی را وارد کنید">
                                           </div>
                                           <div class="col-6 form-group">
                                               <label for="exampleInputPhone">شماره همراه</label>
                                               <input type="text" class="form-control" id="exampleInputPhone" name="phone" placeholder="شماره همراه را وارد کنید">
                                           </div>
                                       </div>


                                        <div class="row">
                                           <div class="col-6 form-group">
                                               <label for="exampleInputEmail1">آدرس ایمیل</label>
                                               <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="ایمیل را وارد کنید">
                                           </div>
                                           <div class="col-6 form-group">
                                               <label for="exampleInputPassword1">Password</label>
                                               <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="پسورد را وارد کنید">
                                           </div>
                                       </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">ارسال</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">لیست مدیران</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tr>
                                        <th>شناسه</th>
                                        <th>نام و نام خانوادگی</th>
                                        <th>ایمیل</th>
                                        <th>شماره همراه</th>
                                        <th>عملیات</th>
                                    </tr>
                                   @foreach($admins as $admin)
                                        @if($admin->id !== auth()->guard('admin')->id())
                                            <tr>
                                                <td>{{$admin->id}}</td>
                                                <td>{{$admin->name}}</td>
                                                <td>{{$admin->email}}</td>
                                                <td>{{$admin->phone}}</td>
                                                <td>
                                                    <div class="row">
                                                        <a href="{{route('admins.edit',$admin->id)}}" class="btn btn-primary ml-2">ویرایش </a>
                                                        <form action="{{route('admins.destroy',$admin->id)}}" method="POST" >
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">حذف </button>
                                                        </form>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endif
                                        @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
{{--@section('js')--}}
{{--    <script >--}}
{{--           function sweetAlert(id) {--}}

{{--               Swal.fire({--}}
{{--                   title: '<strong>هشدار</strong>',--}}
{{--                   icon: 'warning',--}}
{{--                   html:--}}
{{--                       'آیا از حذف این مورد اطمینان دارید؟!' ,--}}
{{--                   showCloseButton: true,--}}
{{--                   showCancelButton: true,--}}
{{--                   focusConfirm: false,--}}
{{--                   confirmButtonText:--}}
{{--                       'حذف',--}}
{{--                   confirmButtonAriaLabel: 'Thumbs up, great!',--}}
{{--                   cancelButtonText:--}}
{{--                       'لغو',--}}
{{--                   cancelButtonAriaLabel: 'Thumbs down'--}}
{{--               }).then((result) => {--}}
{{--                   /* Read more about isConfirmed, isDenied below */--}}
{{--                   if (result.isConfirmed) {--}}
{{--                       axios.post("http://127.0.0.1:8000/fdcore/admins/destroy/"+id, {},{--}}
{{--                           param:{--}}
{{--                               header:{--}}
{{--                                   'X-Requested-With': 'XMLHttpRequest',--}}
{{--                                   'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')--}}
{{--                               }--}}
{{--                           }--}}
{{--                       })--}}
{{--                           .then((response) => console.log(response.data))--}}
{{--                           .then((error) => console.log(error));--}}

{{--                       // if (!result.error) {--}}
{{--                       //     Swal.fire('حذف شذ!', 'عملیات با موفقیت انجام شد', 'success')--}}
{{--                       // }--}}
{{--                       // else {--}}
{{--                       //     Swal.fire('خظا!', 'خطایی رخ داده مجددا امتحان کنید', 'info')--}}
{{--                       // }--}}
{{--                   }--}}
{{--               })}--}}
{{--    </script>--}}
{{--@endsection--}}