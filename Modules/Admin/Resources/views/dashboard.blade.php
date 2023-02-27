@extends('admin::layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>داشبورد</h1>
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
                            <div class="card-header text-center">
                                <h2 class="card-title">پنل مدیریت </h2>
                                <h3 class="card-title text-primary">تعاونی تامین نیاز کشوری پیشخوان دولت </h3>
                            </div>
                        </div>

                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
