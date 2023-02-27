@extends('admin::layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>جزئیات دفتر پیشخوان</h1>
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
                                <div class="row justify-content-between m-4">
                                    <div class="col-4"><h6>تغییر وضعیت</h6></div>
                                    <div class="col-4">
                                        <div class="row">
                                            <form action="{{route('office-reject',$office->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">رد کردن</button>
                                            </form>
                                            <form action="{{route('office-confirm',$office->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success">تایید کردن</button>
                                            </form>
                                        </div>


                                    </div>
                                </div>
                                <h3 class="card-title">جزئیات دفتر پیشخوان</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body  p-4">
                                <!-- form start -->

                                <div class="row ">

                                    <div class="col-4">
                                        <p>
                                            <span><b>نام و نام خانوادگی :</b></span><br>
                                            {{$office->first_name.' '.$office->last_name}}
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p>
                                            <span><b>کد دفتر پیشخوان :</b></span><br>
                                            {{$office->office_code}}
                                        </p>
                                    </div>

                                    <div class="col-4">
                                        <p>
                                            <span><b>نوع دفتر :</b></span><br>
                                            @if($office->buy_type == '1')
                                                شهری
                                            @else
                                                روستایی
                                            @endif
                                        </p>
                                    </div>

                                </div>

                                <div class="row text-right  ">
                                    <div class="col-4">
                                        <p>
                                            <span><b>مشخصات دفتر :</b></span><br>
                                            @if($office->buy_type == '1')
                                                حقوقی
                                            @else
                                                حقیقی
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p>
                                            <span><b>سریال کارت ملی:</b></span><br>
                                            {{$office->national_card_series}}
                                        </p>
                                    </div>

                                    <div class="col-4">
                                        <p>
                                            <span><b>کد ملی:</b></span><br>
                                            {{$office->national_code}}
                                        </p>
                                    </div>


                                </div>

                                <div class="row text-right  ">
                                    <div class="col-4">
                                        <p>
                                            <span><b>نام پدر :</b></span><br>
                                           {{$office->father_name}}
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p>
                                            <span><b>شماره ثابت:</b></span><br>
                                            {{$office->phone}}
                                        </p>
                                    </div>

                                    <div class="col-4">
                                        <p>
                                            <span><b>شماره شناسنامه:</b></span><br>
                                            {{$office->birth_certificate_number}}
                                        </p>
                                    </div>


                                </div>

                                <div class="row text-right  ">
                                    <div class="col-4">
                                        <p>
                                            <span><b>سری شناسنامه :</b></span><br>
                                           {{$office->birth_certificate_series}}
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p>
                                            <span><b>سریال شناسنامه:</b></span><br>
                                            {{$office->birth_certificate_serial}}
                                        </p>
                                    </div>

                                    <div class="col-4">
                                        <p>
                                            <span><b>تاریخ تولد:</b></span><br>
                                            {{$office->birthday}}
                                        </p>
                                    </div>


                                </div>

                                <div class="row text-right  ">
                                    <div class="col-4">
                                        <p>
                                            <span><b>استان :</b></span><br>
                                           {{$office->province}}
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p>
                                            <span><b>شهر:</b></span><br>
                                            {{$office->city}}
                                        </p>
                                    </div>

                                    <div class="col-4">
                                        <p>
                                            <span><b>آدرس:</b></span><br>
                                            {{$office->address}}
                                        </p>
                                    </div>


                                </div>

                                <div class="row text-right  ">
                                    <div class="col-4">
                                        <p>
                                            <span><b>کد پستی :</b></span><br>
                                           {{$office->postal_code}}
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p>
                                            <span><b>شماره همراه مدیر :</b></span><br>
                                            {{$office->mobile}}
                                        </p>
                                    </div>

                                    <div class="col-4">
                                        <p>
                                            <span><b>دستگاه پوز:</b></span><br>
                                            @if($office->has_card_reader == '1')
                                                دارد
                                            @else
                                                ندارد
                                            @endif
                                        </p>
                                    </div>


                                </div>

                                <div class="row text-right  ">
                                    <div class="col-4">
                                        <p>
                                            <span><b>نام بانک دارای حساب:</b></span><br>
                                           {{$office->bank}}
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p>
                                            <span><b>شماره حساب :</b></span><br>
                                            {{$office->account_number}}
                                        </p>
                                    </div>

                                    <div class="col-4">
                                        <p>
                                            <span><b>شماره شبا:</b></span><br>
                                            IR{{$office->iban}}
                                        </p>
                                    </div>


                                </div>

                                <div class="row text-right  ">
                                    <div class="col-4">
                                        <p>
                                            <span><b>کد رهگیری مالیاتی:</b></span><br>
                                           {{$office->tax_code}}
                                        </p>
                                    </div>

                                </div>

                                <div class="row justify-content-around  ">
                                    <div class="col-5 mt-3">
                                        <a href="{{$office->office_permit_path}}" target="_blank">
                                            <img src="{{$office->office_permit_path}}" alt="" class="w-100" height="auto">
                                        </a>

                                    </div>
                                    <div class="col-5 mt-3">
                                        <a href="{{$office->national_card_path}}" target="_blank">
                                        <img src="{{$office->national_card_path}}" alt="" class="w-100" height="auto">
                                        </a>
                                    </div>
                                    <div class="col-5 mt-3">
                                        <a href="{{$office->national_card_back_path}}" target="_blank">
                                        <img src="{{$office->national_card_back_path}}" alt="" class="w-100" height="auto">
                                        </a>
                                    </div>
                                    <div class="col-5 mt-3">
                                        <a href="{{$office->bank_account_path}}" target="_blank">
                                        <img src="{{$office->bank_account_path}}" alt="" class="w-100" height="auto">
                                        </a>
                                    </div>
                                    <div class="col-5 mt-3">
                                        <a href="{{$office->commitment_letter_path}}" target="_blank">
                                        <img src="{{$office->commitment_letter_path}}" alt="" class="w-100" height="auto">
                                        </a>
                                    </div>
                                </div>



                            </div>
                            <!-- /.card-body -->


                            <div class="card-footer">
                                <a href="{{route('offices.list')}}"  class="btn btn-danger">بازگشت</a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
