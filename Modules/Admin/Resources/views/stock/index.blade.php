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
                                <h3 class="card-title">لیست سهامداران</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tr>
                                        <th>شناسه</th>
                                        <th>نام و نام خانوادگی</th>
                                        <th>جنسیت</th>
                                        <th>شماره همراه</th>
                                        <th>کد ملی</th>
                                        <th>عملیات</th>
                                    </tr>
                                    @foreach($stockholders as $stockholder)

                                            <tr>
                                                <td>{{$stockholder->id}}</td>
                                                <td>{{$stockholder->first_name .' '.$stockholder->last_name  }}</td>
                                                <td>{{$stockholder->gender == '1' ? 'آقا' : 'خانم' }}</td>
                                                <td>{{$stockholder->phone}}</td>
                                                <td>{{$stockholder->national_code}}</td>
                                                <td>
                                                   <div class="row">
                                                       <a href="{{route('stockholders.edit',$stockholder->id)}}" class="btn btn-primary ml-2">ویرایش </a>

                                                   </div>
                                                </td>
                                            </tr>
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
