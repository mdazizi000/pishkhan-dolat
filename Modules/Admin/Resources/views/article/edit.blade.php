@extends('admin::layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ویرایش مقاله</h1>
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
                                <h3 class="card-title">ویرایش مقاله </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body  p-0">
                                <!-- form start -->
                                <form action="{{route('contents.update',$data->id)}}" method="POST" role="form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6 form-group">
                                                <label for="title">عنوان</label>
                                                <input type="text" class="form-control" id="title" name="title" value="{{$data->title}}" placeholder="نام نام خانوادگی را وارد کنید">
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label for="text">متن مقاله</label>
                                                <textarea  class="form-control" id="text" name="text">{{$data->text}}</textarea>
                                            </div>
                                        </div>

                                        <div class="row justify-content-lg-start">
                                            <label class="btn btn-primary" for="image">آپلود عکس</label>
                                            <input type="file" hidden class="form-control" id="image" name="image" >

                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">ثبت</button>
                                        <a href="{{route('contents.index')}}"  class="btn btn-danger">لغو</a>
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
