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
                                        <th>نام خریدار</th>
                                        <th>نوع خرید</th>
                                        <th>قیمت</th>
                                        <th>تاریخ ثبت</th>
                                        <th>تاریخ سر رسید</th>
                                        <th>وضعیت پرداخت</th>
                                        <th>نمایش</th>
                                    </tr>

                                    @foreach($stocks as $stock)

                                        <tr>
                                            <td>{{$stock->id}}</td>
                                            <td>{{$stock->holder->first_name .' '.$stock->holder->last_name  }}</td>
                                            <td>
                                                @if($stock->buy_type == '1')
                                                    نقدی
                                                @else
                                                قسطی
                                                @endif
                                            </td>
                                            <td>{{$stock->price}}</td>
                                            <td>{{verta($stock->due_date)->format('Y/m/d')}}</td>
                                            <td>{{verta($stock->due_date)->format('Y/m/d')}}</td>
                                            <td>@if($stock->status == '1')
                                                    <button class="badge badge-success">پرداخت شده</button>
                                                @else
                                                    <button class="badge badge-danger">پرداخت نشده</button>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <a href="{{route('stocks.show',$stock->id)}}" class="btn btn-primary ml-2">نمایش </a>

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
