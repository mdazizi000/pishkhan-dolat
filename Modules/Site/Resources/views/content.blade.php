<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>مقالات</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="assets/js/bootstrap.min.js" defer></script>

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
            <div class="row justify-content-start">

                <div class="col-6 col-md-2">
                    <a class=" nav-menu" href="/"><i class="fa fa-home" aria-hidden="true"></i>
                        صفحه اصلی</a>
                </div>
                <div class="col-6 col-md-2">
                    <a class=" nav-menu" href="#"><i class="fas fa-hands-holding" aria-hidden="true"></i>خدمات
                        تعاونی</a>
                </div>
                <div class="col-6 col-md-2">
                    <a class=" nav-menu" href="/content"><i class="	fas fa-user-graduate" aria-hidden="true"></i>مقالات
                        آموزشی</a>
                </div>

                <div class="col-6 col-md-2">
                    <a class=" nav-menu" href="/about-us"><i class="	fas fa-file-text" aria-hidden="true"></i>درباره
                        تعاونی</a>
                </div>

                <div class="col-6 col-md-2">
                    <a class=" nav-menu" href="#"><i class="	fas fa-shopping-cart" aria-hidden="true"></i>فروشگاه</a>
                </div>

                <div class="col-6 col-md-2">
                    <a class=" nav-menu" href="{{route('register.stock')}}"><i class="	fas fa-hand-holding-usd" aria-hidden="true"></i>خرید
                        سهام</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-2 text-center text-md-left mt-3">
            <button class="btn btn-light logout-btn"><i class="	fas fa-user" aria-hidden="true"></i>پنل کاربری
            </button>
        </div>

    </div>

    <div class="row notification justify-content-start text-right">
        <div class="col-12 col-md-11 pt-2 "
             style="border: 1px solid rgba(0,0,0,0.78);border-bottom-left-radius: 15px;border-top-left-radius: 15px">
            <p>سید صولت مرتضوی وزیر تعاون ،کار و رفاه اجتماعی</p>
        </div>
        <div class="col-12 col-md-1 notification-title" style="height: 100%;background: #000">
            <b>اطلاعیه ها</b>
        </div>

    </div>
    <div class="row content text-right">
        <div class="col-12 col-md-6 col-lg-3" style="border: 1px solid rgba(0,0,0,0.74);border-radius: 12px;padding-top: 50px;padding-left: 35px;padding-right: 35px">
            <div class="row justify-content-center text-center">
                <div class="col-12 input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="	fas fa-search"
                                                                            aria-hidden="true"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="...جستوجو کنید" aria-label="Username"
                           aria-describedby="basic-addon1">
                </div>

                <div class="col-12" style="border: 1px solid #000 ;border-radius: 12px;padding: 15px 0">
                    <div class="col-12 mb-3">
                        <img src="assets/img/documents.png" width="80" height="auto">
                    </div>
                    <a href="#" style="color: #000;text-decoration: none;">سامانه خدمات دفاتر پیشخوان</a>
                </div>
            </div>

            <div class="row justify-content-around text-center mt-4">

                <div class="col-5" style="border: 1px solid #000 ;border-radius: 12px;padding: 15px 0">
                    <div class="col-12 mb-3">
                        <img src="assets/img/users.png" width="40" height="auto">
                    </div>
                    <a href="#" style="color: #000;text-decoration: none;">هیات مدیره</a>
                </div>

                <div class="col-5" style="border: 1px solid #000 ;border-radius: 12px;padding: 15px 0">
                    <div class="col-12 mb-3">
                        <img src="assets/img/text.png" width="40" height="auto">
                    </div>
                    <a href="#" style="color: #000;text-decoration: none;">مستندات</a>
                </div>
            </div>

            <div class="row justify-content-around text-center mt-4">

                <div class="col-5" style="border: 1px solid #000 ;border-radius: 12px;padding: 15px 0">
                    <div class="col-12 mb-3">
                        <img src="assets/img/managers.png" width="40" height="auto">
                    </div>
                    <a href="#" style="color: #000;text-decoration: none;">مجمع عمومی</a>
                </div>

                <div class="col-5" style="border: 1px solid #000 ;border-radius: 12px;padding: 15px 0">
                    <div class="col-12 mb-3">
                        <img src="assets/img/check.png" width="40" height="auto">
                    </div>
                    <a href="#" style="color: #000;text-decoration: none;">استعلام سهام</a>
                </div>
            </div>

            <div class="row justify-content-around text-center mt-4">

                <div class="col-5" style="border: 1px solid #000 ;border-radius: 12px;padding: 15px 0">
                    <div class="col-12 mb-3">
                        <img src="assets/img/support.png" width="40" height="auto">
                    </div>
                    <a href="#" style="color: #000;text-decoration: none;">ثبت درخواست</a>
                </div>

                <div class="col-5" style="border: 1px solid #000 ;border-radius: 12px;padding: 15px 0">
                    <div class="col-12 mb-3">
                        <img src="assets/img/faq.png" width="40" height="auto">
                    </div>
                    <a href="#" style="color: #000;text-decoration: none;">سوالات متداول</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-9"  style="margin-top:40px;">
            @foreach($contents as $content)
                <a href="{{route('content.show',$content->id)}}" style="text-decoration: none;color: #000">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                {{$content->title}}
                            </div>
                            <div class="card-body row">

                                <div class="col-12 col-md-9">
                                    <p>
                                    <h1>{{$content->title}}</h1><br>
                                    <span>{{$content->title}}</span>
                                    </p>
                                </div>
                                <div class="col-12 col-md-3">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($content->image)}}" width="80%" height="auto">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
{{--            <div class="col-12">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        راهنمای کار در پنل ثبت سفارشات کریر شرکت بادپا و دفاتر پیشخوان--}}
{{--                    </div>--}}
{{--                    <div class="card-body row">--}}
{{--                        <div class="col-9">--}}
{{--                            <p>--}}
{{--                            <h1> راهنمای کار در پنل ثبت سفارشات کریر شرکت بادپا و دفاتر پیشخوان</h1>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <div class="col-3">--}}
{{--                            <img src="/assets/img/badpa.png" width="80%" height="auto">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            {{$contents->links()}}
        </div>
    </div>
</div>
</body>
</html>
