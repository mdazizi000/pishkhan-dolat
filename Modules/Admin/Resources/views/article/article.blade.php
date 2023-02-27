@extends('admin::layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>عملیات مقالات</h1>
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
                                <h3 class="card-title">افزودن مقاله </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body  p-0">
                                <!-- form start -->
                                <form action="{{route('contents.store')}}" method="POST" role="form" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6 form-group">
                                                <label for="title">عنوان</label>
                                                <input type="text" class="form-control" id="title" name="title" placeholder="عنوان مقاله را وارد کنید">
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="text">متن مقاله</label>
                                                <textarea  class="form-control" id="text" name="text" ></textarea>
                                            </div>
                                        </div>


                                        <div class="row justify-content-lg-start">
                                                <label class="btn btn-primary" for="image">آپلود عکس</label>
                                                <input type="file" hidden class="form-control" id="image" name="image" >

                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success col-2">ثبت</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">لیست مقالات</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tr>
                                        <th>شناسه</th>
                                        <th>تصویر</th>
                                        <th>عنوان</th>
                                        <th>عملیات</th>
                                    </tr>
                                    @foreach($articles as $article)
                                            <tr>
                                                <td>{{$article->id}}</td>
                                                <td><img src="{{\Illuminate\Support\Facades\Storage::url($article->image)}}" style="border-radius: 7px" width="50" height="50"></td>
                                                <td>{{$article->title}}</td>
                                                <td>
                                                    <div class="row">
                                                        <a href="{{route('contents.edit',$article->id)}}" class="btn btn-primary ml-2">ویرایش </a>
                                                        <form action="{{route('contents.destroy',$article->id)}}" method="POST" >
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">حذف </button>
                                                        </form>
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
