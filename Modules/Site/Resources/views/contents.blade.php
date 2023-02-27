<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>مقالات</title>
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
            <div class="col-12 col-xl-4 offset-xl-4 mt-5 text-center">
                <h3 class="header-title">تعاونی تامین نیاز های کشوری پیشخوان دولت</h3>
                <p class="header-text">شماره ثبت :567648</p>
            </div>
        </div>
    </div>

</div>

<div class="container">

            <div class="row justify-content-end">
                <button type="button" class="menu-btn" id="open-menu-btn" onclick="{show()}">
                    <i class="fa fa-bars menu-btn"></i>
                </button>
                <button type="button" class="menu-btn" id="close-menu-btn" onclick="{hide()}">
                    <i class="fa fa-window-close menu-btn"></i>
                </button>
            </div>
            <div class="row menu" id="menu">

                <div class="menu-item ">
                    <a href="/contact-us" style="font-size: 14px">تماس باما</a>
                </div>
                <div class="menu-item ">
                    <a href="/about-us" style="font-size: 15px">درباره ما</a>
                </div>
                <div class="menu-item ">
                    <a href="/content">اخبار و وقایع جهان</a>
                </div>
                <div class="menu-item ">
                    <a href="/content">اخبار و وقایع ایران</a>
                </div>
                <div class="menu-item ">
                    <a href="/content">اخبار پیشخوان ها</a>
                </div>

                <div class="menu-item ">
                    <a href="/">صفحه نخست</a>
                </div>


            </div>

    <div class="row justify-content-around">
        @foreach($contents as $content)
            <a  href="{{route('content.show',$content->id)}}"  class="col-12 col-md-6 col-lg-3  articles-box text-center">
                <img src="{{\Illuminate\Support\Facades\Storage::url($content->image)}}" width="100%" height="auto" alt="" class="articles-img">
                <hr/>
                <h4><b>{{$content->title}}</b></h4>
                <hr/>
                <span>بیشتر خواندن...</span>
            </a>
        @endforeach


    </div>
</div>
</body>
</html>
