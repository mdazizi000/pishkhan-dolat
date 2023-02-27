@extends('admin::layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>عملیات سهامداران</h1>
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
                                <h3 class="card-title">ویرایش سهامدار </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body  p-0">
                                <!-- form start -->
                                <form action="{{route('stockholders.update',$data->id)}}" method="POST" role="form" >
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6 form-group">
                                                <label for="first_name">نام  </label>
                                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{$data->first_name}}" placeholder="نام را وارد کنید">
                                            </div>

                                            <div class="col-6 form-group">
                                                <label for="last_name">نام خانوادگی  </label>
                                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{$data->last_name}}" placeholder="نام خانوادگی را وارد کنید">
                                            </div>
                                            <div class="col-6 form-group">
                                                <label for="exampleInputPhone">شماره همراه</label>
                                                <input type="text" class="form-control" id="exampleInputPhone" name="phone" value="{{$data->phone}}" placeholder="شماره همراه را وارد کنید">
                                            </div>

                                            <div class="col-4 form-group">
                                                <label for="gender">جنسیت </label>
                                                <select class="form-control form-control" id="gender" name="gender"
                                                        @if(auth()->guard('stock')->check())
                                                        disabled
                                                        @endif
                                                >
                                                    <option selected disabled>لطفا انتخاب کنید</option>
                                                    <option value="1"
                                                            {{$data->gender == '1' ? 'selected' : ''}}
                                                    >آقا</option>
                                                    <option value="2"
                                                        {{$data->gender == '2' ? 'selected' : ''}}
                                                    >خانم</option>

                                                </select>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-6 form-group">
                                                <label for="natoinal_code">کد ملی</label>
                                                <input type="text" class="form-control" id="natoinal_code" value="{{$data->national_code}}" name="national_code"  placeholder="کد ملی را وارد کنید">
                                            </div>
                                            <div class="col-6 form-group">
                                                <label for="office_code">کد دفتر پیشخوان</label>
                                                <input type="text" class="form-control" id="office_code" name="office_code" value="{{$data->office_code}}" placeholder="کد دفتر پیشخوان را وارد کنید">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">ثبت</button>
                                        <a href="{{route('stockholders.index')}}"  class="btn btn-danger">لغو</a>
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
