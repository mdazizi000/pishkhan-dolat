<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>خرید سهام</title>
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
    <div class="row navbar justify-content-start">
        <div class="col-12 col-md-10">
            <div class="row mb-3">

                <div class="col-4 col-md-2">
                    <a class=" nav-menu" href="/"><i class="fa fa-home" aria-hidden="true"></i>
                        صفحه اصلی</a>
                </div>
                <div class="col-4 col-md-2">
                    <a class=" nav-menu" href="#"><i class="fas fa-hands-holding" aria-hidden="true"></i>خدمات
                        تعاونی</a>
                </div>
                <div class="col-4 col-md-2">
                    <a class=" nav-menu" href="/about-us"><i class="	fas fa-file-text" aria-hidden="true"></i>درباره
                        تعاونی</a>
                </div>

            </div>
        </div>
        <div class="col-12 col-md-2 text-center text-md-left">

            @if(auth()->guard('stock')->check())
                <div class="dropdown">
                    <button class="dropbtn" style="width: 100%">{{auth()->guard('stock')->user()->first_name.''.auth()->guard('stock')->user()->last_name}}<i class="fas fa-arrow-down mr-5 mt-1"></i></button>
                    <div class="dropdown-content">
                        <a href="{{route('profile.stock')}}">پروفایل</a>
                        <a href="{{route('stockholder.logout')}}">خروج</a>

                    </div>
                </div>

            @else
                <a href="{{route('stockholder.login')}}" class="btn btn-light logout-btn"><i class="	fas fa-user" aria-hidden="true"></i>پنل کاربری
                </a>
            @endif
        </div>

    </div>
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
    <div class="row card mb-5">
        <div class="card-header text-right">
            <h4>ثبت نام و خرید سهام</h4>
        </div>
        <div class="card-body ">
            <form action="{{route('buy.stock')}}" method="POST" class="stocks-form">
                @csrf
                <div class="row mt-4 text-right">
                    <div class="col-12 col-sm-6 col-md-4 form-group">
                        <label for="code">کد دفتر پیشخوان *</label>
                        <input type="text" class="form-control" id="code" name="office_code"
                            @if(auth()->guard('stock')->check())
                                value="{{auth()->guard('stock')->user()->office_code}}"
                               disabled
                            @endif
                        >
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 form-group">
                        <label for="first_name">نام *</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                               @if(auth()->guard('stock')->check())
                               value="{{auth()->guard('stock')->user()->first_name}}"
                               disabled
                                @endif
                        >
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 form-group">
                        <label for="last_name">نام خانوادگی *</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                               @if(auth()->guard('stock')->check())
                               value="{{auth()->guard('stock')->user()->last_name}}"
                               disabled
                                @endif
                        >
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 form-group">
                        <label for="national_code">کد ملی *</label>
                        <input type="text" class="form-control" id="national_code" name="national_code"
                               aria-describedby="emailHelp"
                               @if(auth()->guard('stock')->check())
                               value="{{auth()->guard('stock')->user()->national_code}}"
                               disabled
                                @endif
                        >
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 form-group">
                        <label for="phone">موبایل *</label>
                        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp"
                               @if(auth()->guard('stock')->check())
                               value="{{auth()->guard('stock')->user()->phone}}"
                               disabled
                                @endif
                        >
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 form-group">
                        <label for="gender">جنسیت *</label>
                        <select class="form-control form-control" id="gender" name="gender"
                                @if(auth()->guard('stock')->check())
                                disabled
                                @endif
                        >
                            <option selected disabled>لطفا انتخاب کنید</option>
                            <option value="1"
                                    @if(auth()->guard('stock')->check())
                                  {{auth()->guard('stock')->user()->gender == '1' ? 'selected' : ''}}
                                    @endif
                            >آقا</option>
                            <option value="2"
                            @if(auth()->guard('stock')->check())
                                {{auth()->guard('stock')->user()->gender == '2' ? 'selected' : ''}}
                                    @endif
                            >خانم</option>

                        </select>
                    </div>
                </div>
                <p class="mt-3"> جهت عضویت در تعاونی نیاز به خرید سهام به ارزش هر سهم 1,000,000 تومان می باشد که به دو
                    صورت نقد و اقساظ قابل پرداخت است.شیوه ی پرداخت مناسب خود را در زیر انتخاب کنید و مراحل پرداخت را طی
                    نمایید.</p>
                <div class="row text-right">
                    <div class="col-12 col-md-7">
                        <div class="col-12 form-group">
                            <label>نوع خرید</label>
                            <div class="row " style="direction: ltr">
                                <div class="col-6 form-check">
                                    <input class="form-check-input mr-3" type="radio" onchange="showCashTable()"
                                           name="buy_type" id="cash" value="1" checked>
                                    <label class="form-check-label" for="cash">
                                        نقد
                                    </label>
                                </div>
                                <div class="col-6 form-check">
                                    <input class="form-check-input mr-3" type="radio" onchange="showInstallmentsTable()"
                                           name="buy_type" id="installments" value="2">
                                    <label class="form-check-label" for="installments">
                                        اقساطی
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <table class="table" id="cash_table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">مبلغ (تومان)</th>
                                    <th scope="col">تاریخ سر رسید</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>1,000,000</td>
                                    <td>هم اکنون</td>
                                </tr>

                                </tbody>
                            </table>

                            <table class="table" id="installments_table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">مبلغ (تومان)</th>
                                    <th scope="col">تاریخ سر رسید</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>200,000</td>
                                    <td >هم اکنون</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>200,000</td>
                                    <td id="show-date2">1400/01/01</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>200,000</td>
                                    <td id="show-date3">1400/02/01</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>200,000</td>
                                    <td id="show-date4">1400/03/01</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>200,000</td>
                                    <td id="show-date5">1400/04/01</td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 text-center">
                        <h1 id="price">1,000,000 <br> <span style="font-size: 12px">تومان</span></h1>
                        <div class="row text-right">
                            <p>انتخاب درگاه پرداخت آنلاین *</p>
                        </div>

                        <div class="row justify-content-center">
                            <div>
                                <img class="gateway-img" src="/assets/img/melat.png" alt="logo">
                            </div>
                        </div>
                        <div class="row text-right">
                            <div class="input-group mb-3 terms" >

                                <input type="checkbox" id="terms" required class="ml-2">
                                <label class="form-check-label" for="terms">
                                    با تمامی شرایط و قوانین خرید سهام موافقم
                                </label>


                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">پرداخت</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<script>
    function showCashTable() {
        document.getElementById("cash_table").style.display = "table";
        document.getElementById("installments_table").style.display = "none";
        document.getElementById("price").innerHTML= '1,000,000  <br> <span style="font-size: 12px">تومان</span>'
    }

    function showInstallmentsTable() {
        var now =moment();
        console.log(now.add(1,'month').locale('fa').format('YYYY/M/D'))
        document.getElementById("cash_table").style.display = "none";
        document.getElementById("installments_table").style.display = "table";

        document.getElementById("price").innerHTML= '200,000  <br> <span style="font-size: 12px">تومان</span> '
        document.getElementById("show-date2").innerHTML= now.add(1, 'month').locale('fa').format('YYYY/M/D')
        document.getElementById("show-date3").innerHTML= now.add(1, 'month').locale('fa').format('YYYY/M/D')
        document.getElementById("show-date4").innerHTML= now.add(1, 'month').locale('fa').format('YYYY/M/D')
        document.getElementById("show-date5").innerHTML= now.add(1, 'month').locale('fa').format('YYYY/M/D')
    }
</script>
</body>
</html>
