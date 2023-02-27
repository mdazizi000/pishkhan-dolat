@extends('admin::layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>عملیات دفاتر پیشخوان</h1>
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
                                <h3 class="card-title">لیست دفاتر پیشخوان</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tr>
                                        <th>شناسه</th>
                                        <th>نام و نام خانوادگی</th>
                                        <th>شماره همراه</th>
                                        <th>نوع دفتر</th>
                                        <th>استان</th>
                                        <th>وضعیت</th>
                                        <th>لیست کارکنان</th>
                                    </tr>
                                    @foreach($offices as $office)
                                            <tr>
                                                <td>{{$office->id}}</td>
                                                <td>{{$office->first_name.' '.$office->last_name}}</td>
                                                <td>{{$office->mobile}}</td>
                                                <td>{{$office->province}}</td>
                                                <td>
                                                    @if($office->office_type == '1')
                                                        شهری
                                                    @else
                                                        روستایی
                                                    @endif
                                                </td>

                                                <td>
                                                    @if($office->status == '1')
                                                        <div class="badge badge-success">فعال</div>
                                                    @elseif($office->status == '0')
                                                        <div class="badge badge-danger">غیر فعال</div>
                                                    @else
                                                    <div class="badge badge-warning">در انتظار تایید</div>
                                                    @endif
                                                </td>
                                                <td>
                                                        <a href="{{route('offices.details',$office->id)}}" class="btn btn-warning">جزئیات</a>
                                                        <a href="{{route('office-user.list',$office->id)}}" class="btn btn-warning">لیست کارکنان</a>
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
