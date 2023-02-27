<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ورود سهامداران</title>
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

</div>
<div class="container stocks-box">

    <div class="row mb-5 justify-content-center">
        <div class="col-12 col-md-8 col-lg-6  card">
            <div class="card-header text-right">
                <h4>ورود به پنل سهام</h4>
            </div>
            <div class="card-body ">
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
                    @if(\Illuminate\Support\Facades\Session::has('codeError'))
                    <div class="alert alert-danger text-right">
                        {{\Illuminate\Support\Facades\Session::get('codeError')}}
                    </div>
                @endif
                <form action="{{route('stockholder.sendOtp')}}" method="POST" class="stocks-form">
                    @csrf
                    <div class="row mt-4 text-right">
                        <div class="col-12 form-group">
                            <label for="phone">شماره همراه </label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-warning" style="font-size: 23px">دریافت کد</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>

</body>
</html>
