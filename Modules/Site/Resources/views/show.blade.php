<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>جزئیات مقاله</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="/assets/js/bootstrap.min.js" defer></script>

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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{$data->title}}
                    </div>
                    <div class="card-body row">
                        <div class="col-12">
                            <h1 class="content-h1">{{$data->title}}</h1>
                        </div>
                        <div class="col-12">
                            <img src="{{\Illuminate\Support\Facades\Storage::url($data->image)}}" width="100%" height="500">
                        </div>

                        <div class="col-12 text-center mt-5">
                            <p style="width: 100%;height: auto;overflow-y:visible ">
                                {!! $data->text !!}

                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
</body>
</html>
