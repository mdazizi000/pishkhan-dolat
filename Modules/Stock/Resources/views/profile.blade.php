<?php
    $user=auth()->guard('stock')->user();
?>
        <!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>پروفایل</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="assets/js/bootstrap.min.js" defer></script>
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
                <button class="dropbtn">{{$user->first_name.' '.$user->last_name}}<i class="fas fa-arrow-down mr-5 mt-1"></i></button>
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
                <h4>پروفایل</h4>
            </div>
            <div class="card-body ">
                <div class="row text-right profile ">

                    <div class="col-12 col-md-6 col-lg-4">
                        <p>
                            <span><b>نام و نام خانوادگی :</b></span><br>
                            {{$user->first_name.' '.$user->last_name}}
                        </p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <p>
                            <span><b>شماره موبایل :</b></span><br>
                            {{$user->phone}}
                        </p>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <p>
                            <span><b>کد دفتر پیشخوان :</b></span><br>
                            {{$user->office_code}}
                        </p>
                    </div>

                </div>

                <div class="row text-right profile ">

                    <div class="col-12 col-md-6 col-lg-4">
                        <p>
                            <span><b>کد ملی :</b></span><br>
                            {{$user->national_code}}
                        </p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <p>
                            <span><b>جنسیت:</b></span><br>
                            {{$user->gender  == '1'? 'آقا' : 'خانم'}}
                        </p>
                    </div>

                </div>
            </div>
            <div class="card-footer text-right">
                <a href="/" class="btn btn-warning" style="font-size: 22px;margin-top: 24px">بازگشت</a>

            </div>
        </div>
    </div>

</div>

</body>
</html>
