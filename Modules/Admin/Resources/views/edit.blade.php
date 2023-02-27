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
                                <h3 class="card-title">ویرایش مدیر </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body  p-0">
                                <!-- form start -->
                                <form action="{{route('admins.update',$data->id)}}" method="POST" role="form" >
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6 form-group">
                                                <label for="exampleInputName">نام و نام خانوادگی</label>
                                                <input type="text" class="form-control" id="exampleInputName" name="name" value="{{$data->name}}" placeholder="نام نام خانوادگی را وارد کنید">
                                            </div>
                                            <div class="col-6 form-group">
                                                <label for="exampleInputPhone">شماره همراه</label>
                                                <input type="text" class="form-control" id="exampleInputPhone" name="phone" value="{{$data->phone}}" placeholder="شماره همراه را وارد کنید">
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-6 form-group">
                                                <label for="exampleInputEmail1">آدرس ایمیل</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" value="{{$data->email}}"  disabled placeholder="ایمیل را وارد کنید">
                                            </div>
                                            <div class="col-6 form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="پسورد را وارد کنید">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">ثبت</button>
                                        <a href="{{route('admins.index')}}"  class="btn btn-danger">لغو</a>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
