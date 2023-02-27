<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>پنل کاربری</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="/assets/js/bootstrap.min.js" defer></script>

</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="header ">
            <div class="col-4 offset-4 mt-5 text-center">
                <h3 class="header-title">تعاونی تامین نیاز های کشوری پیشخوان دولت</h3>
                <p class="header-text">شماره ثبت :567648</p>
            </div>
        </div>
        <div class="col-12">
            @if ($errors->any())

                <div class="alert alert-danger text-right">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif

            @if(\Illuminate\Support\Facades\Session::has('message'))
                <div class="alert alert-success text-right">
                    {{\Illuminate\Support\Facades\Session::get('message')}}
                </div>
            @endif
        </div>
    </div>
    <div class="row">

        <div class="col-10 dashboard ">
            <div class="row justify-content-between top-menu">
                <div class="col-3 top-menu-left">
                    <div class="row justify-content-between">
                        <span>مدیر دفتر:72162141</span>
                        <a href="{{route('office.logout')}}" class="btn btn-light logout-btn">خروج</a>
                    </div>
                </div>
                <div class="col-9 top-menu-right">
                    <div class="row">
                        <div class="col-2">
                            <a class=" menu-button" href="#"><i class="fa fa-question-circle" aria-hidden="true"></i>مرکز
                                پشتیبانی آنلاین</a>
                        </div>
                        <div class="col-2">
                            <a class=" menu-button" href="#"><i class="	fas fa-user-graduate" aria-hidden="true"></i>مقالات
                                آموزشی</a>
                        </div>
                        @if(auth()->guard('office')->check())
                            <div class="col-2">
                                <a class=" menu-button" href="{{route('user.incentives')}}">مشوق های کاربر </a>
                            </div>
                        @endif
                        <div class="col-2">
                            <a class=" menu-button" href="#">ریز تراکنش ها</a>
                        </div>
                        @if(auth()->guard('office')->check())
                            <div class="col-2">
                                <a class=" menu-button" href="{{route('user.incentives')}}">ثبت کارکنان </a>
                            </div>
                            <div class="col-2">
                                <a class=" menu-button" href="{{route('office.change-password-page')}}">تغییر رمز </a>
                            </div>
                        @endif


                    </div>

                </div>

            </div>
            <div class="col-12 dashboard-content">
                <div class="row justify-content-center">
                    <div class="light-box"></div>
                    <div class="light-box"></div>
                    <div class="light-box"><h4>ارائه پیشنهادات انتقادات</h4></div>
                    <div class="light-box"><h4>مجامع</h4></div>
                    <div class="light-box"><h4>اطلاعیه اعضا</h4></div>
                    <div class="light-box"><h4>پرتال مدیر</h4></div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6 p-5">
                        <div class="row justify-content-around text-center">
                            <div class="col-5 item-button">پرش و پاسخ</div>
                            <div class="col-5 item-button">خدمات اینترنتی</div>
                        </div>

                        <div class="row justify-content-around text-center mt-5">
                            <div class="col-5 item-button">سامانه پشتیبانی دفاتر پیشخوان دولت</div>
                            <div class="col-5 item-button">خدمات متمرکز ثبت احوال</div>
                        </div>

                        <div class="row justify-content-around text-center mt-5">
                            <div class="col-5 item-button"></div>
                            <div class="col-5 item-button">استعلام ثبت احوال</div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="light-box" style="width: 150px"></div>
                            <div class="light-box" style="width: 150px"></div>
                            <div class="light-box" style="width: 150px"></div>
                        </div>
                    </div>
                    <div class="col-6 text-center mb-5"
                         style="font-family: titr, serif;hheight: 500px;background: rgba(229,229,229,0.8);padding-top: 25px">
                        <h4>بخشنامه های سازمانی</h4>
                        @if(isset($banner))
                            <a href="{{$banner->link}}" target="_blank">

                                <div class="row justify-content-center text-center">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($banner->image)}}"
                                         class="w-100" height="90%">
                                </div>
                            </a>
                            <h4><a href="{{$banner->link}}" target="_blank">{{$banner->title}}</a></h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2 sidebar text-center">
            <ul>
                <li class="list-group-item" style="font-family: IRANSans, serif">صفحه نخست</li>
                <li class="list-group-item active">حسابداری<i class="fa fa-tachometer" aria-hidden="true"></i></li>
                <li class="list-group-item"><i class='	fa fa-angle-double-left'
                                               style="float: left;font-size: 16px;margin-top: 5px"
                                               aria-hidden="true"></i>خدمات تامین اجتماعی<i class='fas fa-book-open'
                                                                                            aria-hidden="true"></i></li>
                <li class="list-group-item"><i class='	fa fa-angle-double-left'
                                               style="float: left;font-size: 16px;margin-top: 5px"
                                               aria-hidden="true"></i>خدمات وزارت کار<i class='fa fa-file-text'
                                                                                        aria-hidden="true"></i></li>
                <li class="list-group-item"><i class='	fa fa-angle-double-left'
                                               style="float: left;font-size: 16px;margin-top: 5px"
                                               aria-hidden="true"></i>خدمات وزارت تعاون<i class='fa fa-clone'
                                                                                          aria-hidden="true"></i></li>
                <li class="list-group-item">خدمات سجام و بورس<i class='fa fa-id-card' aria-hidden="true"></i></li>
                <li class="list-group-item">پرداخت قبوض<i class='fa fa-credit-card' aria-hidden="true"></i></li>
                <li class="list-group-item">اعلام مفقودی<i class='fa fa-fax' aria-hidden="true"></i></li>
                <li class="list-group-item">مالیات خودرو<i class='fa fa-taxi' aria-hidden="true"></i></li>
                <li class="list-group-item">عوارض خودرو<i class='fa fa-car' aria-hidden="true"></i></li>

            </ul>
        </div>
    </div>
</div>
</body>
</html>