<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>صفحه نخست</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/assets/js/bootstrap.min.js" defer></script>
    <script>
        function show(){
            document.getElementById("menu").style.display="flex"
            document.getElementById("close-menu-btn").style.display="block"
            document.getElementById("open-menu-btn").style.display="none"
        }
        function hide(){
            document.getElementById("menu").style.display="none"
            document.getElementById("close-menu-btn").style.display="none"
            document.getElementById("open-menu-btn").style.display="block"
        }
    </script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div  class="header " >
            <div class="col-12 col-xl-4 offset-xl-4 mt-5 text-center">
                <h3 class="header-title">تعاونی تامین نیاز های کشوری پیشخوان دولت</h3>
                <p class="header-text">شماره ثبت :567648</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-8 col-xl-9 banner-section ">
            <div class="row justify-content-end">
                <button type="button"  class="menu-btn" id="open-menu-btn" onclick="{show()}">
                    <i class="fa fa-bars menu-btn"></i>
                </button>
                <button type="button"  class="menu-btn" id="close-menu-btn" onclick="{hide()}">
                    <i class="fa fa-window-close menu-btn"></i>
                </button>
            </div>
            <div class="row menu" id="menu">

                <div class="menu-item ">
                    <a href="/contact-us"style="font-size: 14px">تماس باما</a>
                </div>
                <div class="menu-item ">
                    <a href="/about-us"style="font-size: 15px">درباره ما</a>
                </div>
                <div class="menu-item ">
                    <a href="/content">اخبار  و وقایع جهان</a>
                </div>
                <div class="menu-item ">
                    <a href="/content">اخبار  و وقایع ایران</a>
                </div>
                <div class="menu-item ">
                    <a href="/content">اخبار پیشخوان ها</a>
                </div>
                <div class="menu-item ">
                    <a href="{{route('office.login')}}">ورود اعضا</a>
                </div>
                <div class="menu-item ">
                    <a href="{{route('register.stock')}}">خرید سهام</a>
                </div>
                <div class="menu-item ">
                <a href="{{route('stockholder.login')}}">ورود سهامداران</a>
                </div>
                <div class="menu-item ">
                    <a href="#">ورود مهمان</a>
                </div>


            </div>
            <div class="row mt-3">
                <div class="col-12 col-md-3 left-banner-item"></div>
                <div class="col-12 col-md-7 banner"></div>
                <div class="col-12 col-md-2  right-banner-item">
            </div>
        </div>
            <div class="row mt-3 ml-lg-5   justify-content-center ">
                <div class="col-12 mt-3 col-md-2">
                    <a class="btn btn-outline-dark menu-button" href="#">فروشگاه هایپر پیشخوان</a>
                </div>
                <div class="col-12 mt-3 col-md-2">
                    <a class="btn btn-outline-dark menu-button" href="#">درخواست همکاری</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 col-xl-3 form-section text-center mt-sm-3">
            <h4>ورود به سامانه خدمات پیشخوان دولت</h4>

            @if ($errors->any())

                <div class="alert alert-danger text-right">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif

            @if(\Illuminate\Support\Facades\Session::has('message'))
                <div class="alert alert-success text-right">
                    {{\Illuminate\Support\Facades\Session::get('message')}}
                </div>
            @endif
            <div class="col-12">
                <form action="{{route('office.send-otp')}}" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" placeholder="شماره همراه" name="phone" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="username"><i class="fa fa-phone"></i></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">دریافت کد</button>
                </form>
                <a href="{{route('office.login')}}"  class="btn btn-dark w-100 mt-3">ورود با رمز عبور</a>

                <a href="{{route('terms.office')}}" class="btn btn-light submit-btn">فرم ثبت نام</a>
            </div>
            <div class="col-12 enmad-box">
                <img src="/assets/img/enmad.jpg" width="100%" height="170px" >
            </div>
        </div>
    </div>
</div>
</body>
</html>
