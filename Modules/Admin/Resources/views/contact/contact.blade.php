@extends('admin::layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>لیست پیام های دریافتی</h1>
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
                                        <th>شماره همراه</th>
                                        <th>ایمیل</th>
                                        <th>موضوع</th>
                                        <th>نمایش</th>
                                    </tr>

                                    @foreach($data as $message)

                                        <tr>
                                            <td>{{$message->id}}</td>
                                            <td>{{$message->name}}</td>
                                            <td>{{$message->phone}}</td>
                                            <td>{{$message->email}}</td>
                                            <td>{{$message->subject}}</td>
                                            <td>
                                                <div class="row">
                                                        <a href="{{route('contact.show',$message->id)}}" class="btn btn-primary ml-2">نمایش </a>

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
