<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>فاکتور خرید</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="/assets/js/bootstrap.min.js" defer></script>
    <script src="https://unpkg.com/jalali-moment/dist/jalali-moment.browser.js"></script>
</head>
<body>
<div class="container-fluid p-4">
    <div class="row">
        <div class="header ">
            <div class="col-12 col-xl-4 offset-xl-4 mt-5 text-center">
                <h3 class="header-title">تعاونی تامین نیاز های کشوری پیشخوان دولت</h3>
                <p class="header-text">شماره ثبت :567648</p>
            </div>
        </div>
    </div>

    <div class="row navbar justify-content-start">
        <div class="col-12 col-md-10">
            <div class="row">

                <div class="col-6 col-md-2">
                    <a class=" nav-menu" href="/"><i class="fa fa-home" aria-hidden="true"></i>
                        صفحه اصلی</a>
                </div>
                <div class="col-6 col-md-2">
                    <a class=" nav-menu" href="#"><i class="fas fa-file-text" aria-hidden="true"></i>وضعیت مالی</a>
                </div>

                <div class="col-6 mt-2 col-md-2">
                    <a class=" nav-menu" href="{{route('register.stock')}}"><i class="	fas fa-file-text" aria-hidden="true"></i>خرید سهام</a>
                </div>

                <div class="col-6 mt-2 col-md-2">
                    <a class=" nav-menu" href="#"><i class="	fas fa-user" aria-hidden="true"></i>اطلاعات تکمیلی</a>
                </div>
                <div class="col-6 mt-2 col-md-2">
                    <a class=" nav-menu" href="#"><i class="	fas fa-user" aria-hidden="true"></i>یاریگر بیمه</a>
                </div>

                <div class="col-6 mt-2 col-md-2">
                    <a class=" nav-menu" href="#"><i class="	fas fa-user" aria-hidden="true"></i>پیک بادپا</a>
                </div>


            </div>
        </div>
        <div class="col-12 col-md-2 mt-3 justify-content-center">
            <!--            <button class="btn btn-light logout-btn "><i class="	fas fa-user" aria-hidden="true"></i>پنل کاربری-->
            <!--            </button>-->
            <div class="dropdown">
                <button class="dropbtn">{{auth()->guard('stock')->user()->first_name.' '.auth()->guard('stock')->user()->last_name}}<i class="fas fa-arrow-down mr-5 mt-1"></i></button>
                <div class="dropdown-content">
                    <a href="{{route('profile.stock')}}">پروفایل</a>
                    <a href="{{route('stockholder.logout')}}">خروج</a>

                </div>
            </div>

        </div>
    </div>
    <div class="container stocks-box">

        <div class="row card mb-5">
            <div class="card-header text-right">
                <h4>مشخصات فاکتور شماره {{$data->id}}</h4>
            </div>
            <div class="card-body ">
                <div class="row text-right">

                    <div class="col-12 table-responsive">
                        <div class="table-responsive">
                            <table class="table" id="cash_table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">مبلغ (تومان)</th>
                                    <th scope="col">تاریخ سر رسید</th>
                                    <th scope="col">وضعیت</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{$data->price}}</td>
                                    <td>{{verta($data->due_date)->format('Y/m/d')}}</td>
                                    <td>پرداخت شده</td>
                                </tr>

                                </tbody>


                            </table>

                        </div>
                        <p class="invoice_description">
                            فاکتور شماره {{$data->id}} شما به مبلغ {{$data->price}} تومان در تاریخ {{verta($data->updated_at)->format('Y/m/d')}} ساعت {{verta($data->updated_at)->format('H:i:s')}} پرداخت شده است
                        </p>
                    </div>

                </div>
            </div>
            <div class="card-footer text-right">
                <a href="#" class="btn btn-warning" style="font-size: 22px;margin-top: 24px">بازگشت</a>

            </div>
        </div>

    </div>

</body>
</html>
