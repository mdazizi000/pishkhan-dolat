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
            <div class="col-12 dashboard-content pt-5 pb-5">


                <div class="row justify-content-center mt-5 m-5 text-center"> <h4>تغییر رمزعبور</h4></div>

                <div class="row justify-content-center m-5">

                    <form class="col-12 col-md-6 text-right" action="{{route('office.change-password')}}" method="POST" >
                        @csrf
                        @method('PUT')

                        <div class="form-group"><label for="new-pass">رمز عبور</label>
                            <div class="input-group mb-3">
                                <input type="password" name="password" id="new-pass" class="form-control text-right" placeholder="رمزعبور" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            </div>
                        </div>

                        <div class="form-group"><label for="new-pass">تکرار رمز عبور</label>
                            <div class="input-group mb-3">
                                <input type="password" name="confirm_password" id="new-pass" class="form-control text-right" placeholder="تکرار رمزعبور" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">ورود به سیستم</button>
                    </form>
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