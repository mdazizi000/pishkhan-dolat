<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>قوانین و مقررات</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="/assets/js/bootstrap.min.js" defer></script>

</head>
<body>
<div class="container">
    <div class="row  justify-content-center about-section">
        <h4>درخواست همکاری و استفاده از خدمات و پرتال سرتاسری شرکت تعاونی کشوری پیشخوان دولت</h4>
        <p>
            <br>
        <h5>(( این ثبت نام انحصار دفاترپیشخوان دولت شهری و <b>ITC</b> روستایی و نظایر آنها می باشد ))</h5>
        </p>
        <h4 style="text-align: right">قابل توجه همکاران گرامی:</h4>
        <p class="text-right">با توجه به دستورالعمل و ابلاغیه های ریاست محترم سازمان تنظیم مقررات و ارتباطات رادیویی درخصوص ارائه خدمات از طریق درگاه پیشخوان دولت، کلیه دفاتر موظف هستند تراکنش های مالی حاصل از ارائه خدمات خود را توسط دستگاه های <b style="font-weight: 900">PC-POS</b> که منتصب به این شرکت میباشد، انجام دهند که پس از ثبت نام و درخواست شما عزیزان هماهنگی‌های لازم جهت ارسال و نصب <b style="font-weight: 900">PC-POS</b>  های لازم از طرف این شرکت اقدام خواهد شد، لذا خواهشمند است در این خصوص همکاری لازم را با مسئولین ذیربط بفرمایید، لازم به ذکر است کارمزدها و حق الزحمه مدیران دفاتر ذیل مقررات و مصوبات سازمان تنظیم مقررات ارتباطات رادیویی به صورت شفاف و آنلاین توسط شاپرک و قوانین جاری بانکی به حساب اعلام شده از سوی مدیران محترم دفاتر پرداخت خواهد شد، شایان ذکر است کارمزد حاصل از ارائه خدمات چه در خدمات دولتی و چه در خدمات غیر دولتی به صورت شفاف در قسمت نرخ نامه های سایت قابل مشاهده می باشد که پس از ثبت نام و دریافت نام کاربری و کلمه عبور در دسترس شما عزیزان قرار خواهد گرفت.
        </p>

        <p>امید است با رونق کسب و کار موجب اشتغال زایی پایدار بهتر و مناسب تر برای فرزندان ایران زمین باشیم.</p><br>
        <p> در صورت نیاز با کلیک در <a href="'contact-us">اینجا</a> برای ما پیام خود را ارسال فرمائید و یا با شماره های ......... تماس حاصل نمایید </p>
    </div>

    <h3 style="align-self: end;font-family: 'B Titr',serif;margin-top: 35px">تعاونی تامین نیاز کشوری پیشخوان دولت</h3>

    <form action="{{route('register.office')}}" method="GET">
        @csrf
        <div class="row mt-4 justify-content-start text-right">
            <div class="col-12 form-group form-check" style="font-family: 'B Titr',serif">
                <label class="form-check-label" for="exampleCheck1">با قوانین فوق موافقم</label>
                <input type="checkbox" class="form-check-input ml-2" id="exampleCheck1" required>
            </div>
        </div>


    <div class="row justify-content-center text-center" style="direction: rtl;font-family: 'B Titr',serif">
        <h4>فرم درخواست استفاده از سرویس های دفاتر شهری و <b>ITC</b> روستایی</h4>
    </div>

    <div class="row justify-content-center text-center" style="direction: rtl;font-family: 'B Titr',serif">
        <button type="submit" class="register-btn">درخواست دریافت خدمات</button>
    </div>
    </form>
</div>
</body>
</html>
