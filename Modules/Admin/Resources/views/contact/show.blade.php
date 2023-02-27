@extends('admin::layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>جزئیات پیام</h1>
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
                                <h3 class="card-title">جزئیات پیام</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body  p-4">
                                <!-- form start -->
                                <div class="row ">

                                    <div class="col-4">
                                        <p>
                                            <span><b>نام و نام خانوادگی :</b></span><br>
                                            {{$data->name}}
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p>
                                            <span><b>موبایل :</b></span><br>
                                            {{$data->phone}}
                                        </p>
                                    </div>

                                    <div class="col-4">
                                        <p>
                                            <span><b>ایمیل :</b></span><br>
                                            {{$data->email}}
                                        </p>
                                    </div>

                                </div>

                                <div class="row text-right  ">

                                    <div class="col-4">
                                        <p>
                                            <span><b>موضوع :</b></span><br>
                                            {{$data->subject}}
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <p>
                                            <span><b>پیام:</b></span><br>
                                            {{$data->message}}
                                        </p>
                                    </div>

                                </div>




                            </div>

                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
