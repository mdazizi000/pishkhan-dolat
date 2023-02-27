<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>فاکتور خرید</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="assets/js/bootstrap.min.js" defer></script>
    <script src="https://unpkg.com/jalali-moment/dist/jalali-moment.browser.js"></script>
</head>
<body>

<!-- End Page Title -->
@if($status == 1)
    <!-- Faq -->
    <section class="faq-area pt-100">
        <div class="container">
            <div class="row faq-wrap">
                <div class="col-lg-12">
                    <div class="faq-item"
                         style="border: 1px solid #000;height: auto;border-radius: 15px;max-height: 450px;padding: 10px 0 50px 0">
                        <div class="row text-center justify-content-center">
                            <a href="#" class="text-success" style="font-size: 130px ">
                                <i class="fa fa-check-circle"></i>
                            </a>
                            <div class="col-12">
                                <h3>پرداخت موفق</h3>
                                <p class="text-dark">پرداخت شما با موفقیت انجام شد</p>
                                <p class="text-dark">کد پیگیری :{{$reference_id}}</p>
                                <a href="{{route('invoice.stock',['id'=>$stockId])}}" class="btn btn-warning">مشاهده فاکتور</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Faq -->


@else
    <!-- Faq -->
    <section class="faq-area pt-100">
        <div class="container">
            <div class="row faq-wrap">
                <div class="col-lg-12">
                    <div class="faq-item"
                         style="border: 1px solid #000;height: auto;border-radius: 15px;max-height: 450px;padding: 10px 0 50px 0">
                        <div class="row text-center justify-content-center">
                            <a href="#" class="text-danger" style="font-size: 130px ">
                                <i class="fa fa-close"></i>
                            </a>
                            <div class="col-12">
                                <h3>خطا</h3>
                                <p class="text-dark">پرداخت با خطا مواجه شد دوباره امتحان کنید</p>
                                <a href="/" class="btn btn-warning">باز گشت به صفحه خرید</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Faq -->
@endif
</body>
</html>

