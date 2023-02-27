@extends('admin::layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>جزئیات سهام</h1>
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
                                <h3 class="card-title">جزئیات سهام</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body  p-4">
                                <!-- form start -->
                                <div class="row ">

                                    <div class="col-4">
                                        <p>
                                            <span><b>نام و نام خانوادگی :</b></span><br>
                                            {{$stock->holder->first_name.' '.$stock->holder->last_name}}
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p>
                                            <span><b>قیمت :</b></span><br>
                                            {{$stock->price}}
                                        </p>
                                    </div>

                                    <div class="col-4">
                                        <p>
                                            <span><b>نوع خرید :</b></span><br>
                                            @if($stock->buy_type == '1')
                                                نقدی
                                            @else
                                                قسطی
                                            @endif
                                        </p>
                                    </div>

                                </div>

                                <div class="row text-right  ">

                                    <div class="col-4">
                                        <p>
                                            <span><b>تاریخ ثبت :</b></span><br>
                                            {{verta($stock->created_at)->format('Y/m/d')}}
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p>
                                            <span><b>تاریخ سر رسید:</b></span><br>
                                            {{verta($stock->due_date)->format('Y/m/d')}}
                                        </p>
                                    </div>

                                </div>




                            </div>
                            <!-- /.card-body -->

                            @if($stock->buy_type == '2')
                                <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>شناسه</th>
                                                <th>مبلغ</th>
                                                <th>تاریخ ثبت</th>
                                                <th>تاریخ سر رسید</th>
                                                <th>وضعیت</th>
                                            </tr>
                                            @foreach($stock->subStocks as $item)
                                                <tr>
                                                    <td>{{$item->id}}</td>
                                                    <td>{{$item->price}}</td>
                                                    <td>{{verta($item->due_date)->format('Y/m/d')}}</td>
                                                    <td>{{verta($item->due_date)->format('Y/m/d')}}</td>
                                                    <td>@if($item->status == '1')
                                                            <button class="badge badge-success">پرداخت شده</button>
                                                        @else
                                                            <button class="badge badge-danger">پرداخت نشده</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                            @endif


                            <div class="card-footer">
                                <a href="{{route('stocks.index')}}"  class="btn btn-danger">بازگشت</a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
