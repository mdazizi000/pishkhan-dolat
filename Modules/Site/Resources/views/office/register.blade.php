<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ثبت نام-مرحله اول</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link type="text/css" rel="stylesheet" href="jalalidatepicker.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
    <script type="text/javascript" src="jalalidatepicker.min.js"></script>
    <script src="/assets/js/bootstrap.min.js" defer></script>

</head>
<body>
<div class="container">
    <div class="row  justify-content-center " style="margin-bottom: 80px">
        <div class="col-12  text-center">
          
            <h5 style="margin-top: 120px"><b>فرم درخواست سرویس دفاتر شهری و استانی اصلی</b></h5>
        </div>
        <div class="col-12 register-form">
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
            <form action="{{route('offices.store')}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-4 form-group">
                        <label for="office_code">کد دفتر پیشخوان</label>
                        <input type="text" class="form-control" id="office_code" name="office_code" aria-describedby="emailHelp">
                    </div>

                    <div class="col-4 form-group">
                        <label >نوع دفتر</label>
                        <div class="row" style="direction: ltr">
                            <div class="col-6 form-check">
                                <input class="form-check-input mr-3" type="radio" name="office_type" id="exampleRadios1" value="1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    شهری
                                </label>
                            </div>
                            <div class="col-6 form-check">
                                <input class="form-check-input mr-3" type="radio" name="office_type" id="exampleRadios2" value="2">
                                <label class="form-check-label" for="exampleRadios2">
                                    روستایی
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 form-group">
                        <label>مشخصات دفتر</label>
                        <div class="row" style="direction: ltr">
                            <div class="col-6 form-check">
                                <input class="form-check-input mr-3" type="radio" name="office_details" id="exampleRadios4" value="1" checked>
                                <label class="form-check-label" for="exampleRadios4">
                                    حقوقی
                                </label>
                            </div>
                            <div class="col-6 form-check">
                                <input class="form-check-input mr-3" type="radio" name="office_details" id="exampleRadios3" value="2">
                                <label class="form-check-label" for="exampleRadios3">
                                    حقیقی
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-title-section">
                    <div class="title-content">
                        مشخصات مدیر و صاحب پروانه
                    </div>

                </div>
                <div class="row mt-4">
                    <div class="col-4 form-group">
                        <label for="exampleInputEmail2">نام</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" name="first_name" aria-describedby="emailHelp">
                    </div>
                    <div class="col-4 form-group">
                        <label for="exampleInputEmail23">نام خانوادگی</label>
                        <input type="text" class="form-control" id="exampleInputEmail23" name="last_name" aria-describedby="emailHelp">
                    </div>

                    <div class="col-4 form-group">
                        <label for="national_card_series">سریال کارت ملی یا کد پیگیری</label>
                        <input type="text" class="form-control" id="national_card_series"  name="national_card_series" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4 form-group">
                        <label for="national_code">کد ملی مدیر</label>
                        <input type="text" class="form-control" id="national_code" name="national_code" aria-describedby="emailHelp">
                    </div>
                    <div class="col-4 form-group">
                        <label for="father_name">نام پدر</label>
                        <input type="text" class="form-control" id="father_name" name="father_name" aria-describedby="emailHelp">
                    </div>

                    <div class="col-4 form-group">
                        <label for="phone">شماره ثابت</label>
                        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4 form-group">
                        <label for="birth_certificate_number">شماره شناسنامه</label>
                        <input type="text" class="form-control" id="birth_certificate_number" name="birth_certificate_number" aria-describedby="emailHelp">
                    </div>
                    <div class="col-4 form-group">
                        <label for="birth_certificate_series">سری شناسنامه</label>
                        <input type="text" class="form-control" id="birth_certificate_series" name="birth_certificate_series" aria-describedby="emailHelp">
                    </div>

                    <div class="col-4 form-group">
                        <label for="birth_certificate_serial">سریال شناسنامه</label>
                        <input type="text" class="form-control" id="birth_certificate_serial" name="birth_certificate_serial" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 form-group">
                        <label for="birthday">تاریخ تولد</label>
                        <input type="text" class="form-control" id="birthday" placeholder="yyyy/mm/dd" name="birthday" aria-describedby="emailHelp">
                    </div>

                </div>
                <div class="row form-title-section">
                    <div class="title-content">
                        مشخصات دفتر پیشخوان
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4 form-group">
                        <label for="province">استان</label>
                        <select class="form-control form-control" id="province" name="province">
                            <option selected disabled>لطفا انتخاب کنید</option>
                            @foreach($provinces as $province)
                                <option value="{{$province->name}}">{{$province->name}}</option>
                            @endforeach


                        </select>
                    </div>
                    <div class="col-4 form-group">
                        <label for="city">شهر</label>
                        <select class="form-control form-control" id="city" name="city">
                            <option selected disabled>لطفا انتخاب کنید</option>
                            @foreach($cities as $city)
                                <option value="{{$city->name}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4 form-group">
                        <label for="address">آدرس</label>
                        <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4 form-group">
                        <label for="postal_code">کد پستی</label>
                        <input type="text" class="form-control" id="postal_code"name="postal_code" aria-describedby="emailHelp">
                    </div>
                    <div class="col-4 form-group">
                        <label for="mobile">شماره همراه مدیر دفتر</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="row form-title-section">
                    <div class="title-content">
                        مشخصات بانکی
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-4 form-group">
                        <label>آیا دستگاه پوز دارید؟</label>
                        <div class="row" style="direction: ltr">
                            <div class="col-6 form-check">
                                <input class="form-check-input mr-3" type="radio" name="has_card_reader" id="exampleRadios4" value="1" checked>
                                <label class="form-check-label" for="exampleRadios4">
                                    بله
                                </label>
                            </div>
                            <div class="col-6 form-check">
                                <input class="form-check-input mr-3" type="radio" name="has_card_reader" id="exampleRadios3" value="0">
                                <label class="form-check-label" for="exampleRadios3">
                                    خیر
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 form-group">
                        <label for="exampleInputEmail78">نام بانک  دارای حساب</label>
                        <select class="form-control form-control" id="exampleInputEmail78" name="bank">
                            <option disabled selected>لطفا انتخاب کنید</option>
                            <option value="بانک ملّی">بانک ملّی</option>
                            <option value="بانک سپه">بانک سپه</option>
                            <option value="بانک صنعت و معدن">بانک صنعت و معدن</option>
                            <option value="بانک کشاورزی">بانک کشاورزی</option>
                            <option value="بانک مسکن">بانک مسکن</option>
                            <option value="بانک توسعه صادرات ایران ">بانک توسعه صادرات ایران </option>
                            <option value="بانک توسعه تعاون">بانک توسعه تعاون</option>
                            <option value="پست بانک ایران">پست بانک ایران</option>
                            <option value="بانک اقتصاد نوین">بانک اقتصاد نوین</option>
                            <option value="بانک پارسیان">بانک پارسیان</option>
                            <option value="بانک کار آفرین">بانک کار آفرین</option>
                            <option value="بانک سامان">بانک سامان</option>
                            <option value="بانک سینا">بانک سینا</option>
                            <option value="بانک خاورمیانه">بانک خاورمیانه</option>
                            <option value="بانک شهر">بانک شهر</option>
                            <option value="بانک دی">بانک دی</option>
                            <option value="بانک صادرات">بانک صادرات</option>
                            <option value="بانک ملت">بانک ملت</option>
                            <option value="بانک تجارت">بانک تجارت</option>
                            <option value="بانک زفاه">بانک زفاه</option>
                            <option value="بانک آینده">بانک آینده</option>
                            <option value="بانک گردشگری">بانک گردشگری</option>
                            <option value="بانک ایران زمین">بانک ایران زمین</option>
                            <option value="بانک سرمایه">بانک سرمایه</option>
                            <option value="بانک پاسارگاد">بانک پاسارگاد</option>
                            <option value="بانک قرض الحسنه رسالت">بانک قرض الحسنه رسالت</option>
                            <option value="بانک قرض الحسنه مهر ایران">بانک قرض الحسنه مهر ایران</option>
                            <option value="موسسه اعتباری کاسپین">موسسه اعتباری کاسپین</option>
                            <option value="موسسه اعتباری کوثر">موسسه اعتباری کوثر</option>
                            <option value="موسسه اعتباری توسعه">موسسه اعتباری توسعه</option>
                            <option value="موسسه اعتباری ملل">موسسه اعتباری ملل</option>
                            <option value="موسسه اعتباری نور">موسسه اعتباری نور</option>
                        </select>
                    </div>
                    <div class="col-4 form-group">
                        <label for="account_number">شماره حساب</label>
                        <input type="text" class="form-control" placeholder="*************" id="account_number" name="account_number" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-4 form-group" style="direction: ltr">
                        <label for="fgf4">شماره شبا</label>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="iban-addon1">IR</span>
                            </div>
                            <input type="text" class="form-control" placeholder="***********" name="iban" id="iban" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-4 form-group">
                        <label for="tax_code">کد رهگیری مالیاتی</label>
                        <input type="text" class="form-control" placeholder="545****145" name="tax_code" id="tax_code" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="row form-title-section">
                    <div class="title-content">
                        بارگذاری مدارک
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4 ">
                        <label style="display: block" >پروانه دفتر</label>
                        <label for="office_permit" class="btn btn-outline-success upload-btn">بارگذاری فایل<i class="fa fa-upload mr-2" aria-hidden="true"></i></label>
                        <input type="file" hidden name="office_permit" id="office_permit">
                    </div>

                    <div class="col-4 ">
                        <label style="display: block" >کارت ملی صاحب پروانه</label>
                        <label for="national_card" class="btn btn-outline-success upload-btn">بارگذاری فایل<i class="fa fa-upload mr-2" aria-hidden="true"></i></label>
                        <input type="file" hidden name="national_card" id="national_card">
                    </div>
                    <div class="col-4 ">
                        <label style="display: block" >تصویری از حساب بانکی</label>
                        <label for="bank_account" class="btn btn-outline-success upload-btn">بارگذاری فایل<i class="fa fa-upload mr-2" aria-hidden="true"></i></label>
                        <input type="file" hidden name="bank_account" id="bank_account">
                    </div>

                </div>

                <div class="row mt-4">
                    <div class="col-4 ">
                        <label style="display: block" >تصویر پشت کارت ملی</label>
                        <label for="national_card_back" class="btn btn-outline-success upload-btn">بارگذاری فایل<i class="fa fa-upload mr-2" aria-hidden="true"></i></label>
                        <input type="file" hidden name="national_card_back" id="national_card_back">
                    </div>

                    <div class="col-4 ">
                        <label style="display: block" > تعهد نامه</label>
                        <a href="https://pishkhantaavoni.com/download/commitment-letter.pdf" target="_blank" class="btn btn-warning upload-btn">دانلود تعهد نامه<i class="fa fa-upload mr-2" aria-hidden="true"></i></a>
                    </div>

                    <div class="col-4 ">
                        <label style="display: block" >تصویر تعهد نامه</label>
                        <label for="commitment_letter" class="btn btn-outline-success upload-btn">بارگذاری فایل<i class="fa fa-upload mr-2" aria-hidden="true"></i></label>
                        <input type="file" hidden name="commitment_letter" id="commitment_letter">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-6 form-group">
                        <label for="description">توضیحات</label>
                        <textarea  class="form-control" id="description" name="description" aria-describedby="emailHelp" style="height: 200px">توضیحات خود را اینجا بنویسید</textarea>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required >
                        <label class="form-check-label mr-3" for="exampleCheck1">صحت اطلاعات فوق و قوانین بانکداری و قرارداد ارائه خدمات دفاتر پیشخوان دولت مورد تایید اینجانب می باشد</label>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="form-group mt-4 mb-4">
                        <div class="captcha">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                    </div>

                    <div class="col-6 form-group">
                        <label for="captcha" style="display: block">عبارت امنیتی</label>
                       <div class="row mb-3 mr-1">
                           <span>{!! captcha_img() !!}</span>
                       </div>
                        <input id="captcha" type="text" class="form-control mb-4" placeholder="کد امنیتی را وارد کنید" name="captcha">

                        <p><b>*</b> متن عبارت امنیتی به حروف  بزرگ و کوچک حساس می باشد</p>
                    </div>
                </div>

                <button type="submit" class="btn btn-success" >
                    ثبت درخواست
                </button>
                <a href="/" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                    بازگشت
                </a>




            </form>

        </div>
    </div>
</div>
</body>
</html>
