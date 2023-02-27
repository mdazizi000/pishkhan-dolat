<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ورود با رمز عبور</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/assets/js/bootstrap.min.js" defer></script>

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

</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 col-xl-6 form-section text-center mt-sm-3">
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
                <form action="{{route('office.password-login')}}" method="POST" class="mt-4">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" name="username" placeholder="نام کاربری" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="username"><i class="fa fa-user"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control text-center" placeholder="رمزعبور" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="pass"><i class="fa fa-key"></i></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">ورود به سیستم</button>
                </form>

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
