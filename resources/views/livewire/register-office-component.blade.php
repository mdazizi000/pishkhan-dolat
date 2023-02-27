<div class="container">
    <div class="row  justify-content-center " style="margin-bottom: 80px">
        <div class="col-12  text-center">

            <h5 style="margin-top: 120px;direction: rtl"><b>فرم درخواست سرویس دفاتر شهری و <b>ICT</b>استانی </b></h5>
        </div>

        <div class="col-12 register-form">

            @if(\Illuminate\Support\Facades\Session::has('message'))
                <div class="alert alert-success text-right">
                    {{\Illuminate\Support\Facades\Session::get('message')}}
                </div>
            @endif
            <form wire:submit.prevent="store" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-4 form-group">
                        <label for="office_code">کد دفتر پیشخوان</label>
                        <input type="text" class="form-control" id="office_code" wire:model="office_code"
                               aria-describedby="emailHelp">
                        @if ($errors->has("office_code"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('office_code') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                    </div>

                    <div class="col-4 form-group">
                        <label>نوع دفتر</label>
                        <div class="row" style="direction: ltr">
                            <div class="col-6 form-check">
                                <input class="form-check-input mr-3" type="radio" wire:model="office_type"
                                       id="exampleRadios1" value="1" checked>

                                <label class="form-check-label" for="exampleRadios1">
                                    شهری
                                </label>
                            </div>
                            <div class="col-6 form-check">
                                <input class="form-check-input mr-3" type="radio" wire:model="office_type"
                                       id="exampleRadios2" value="2">
                                <label class="form-check-label" for="exampleRadios2">
                                    روستایی
                                </label>
                            </div>
                            @if ($errors->has("office_type"))
                                <div class="alert alert-danger text-right">
                                    <ul>
                                        <span class="error">{{ $errors->first('office_type') }}</span>
                                    </ul>
                                </div><br/>
                            @endif
                        </div>
                    </div>
                    <div class="col-4 form-group">
                        <label>مشخصات دفتر</label>
                        <div class="row" style="direction: ltr">
                            <div class="col-6 form-check">
                                <input class="form-check-input mr-3" type="radio" wire:model="office_details"
                                       id="exampleRadios4" value="1" checked>
                                <label class="form-check-label" for="exampleRadios4">
                                    حقوقی
                                </label>
                            </div>
                            <div class="col-6 form-check">
                                <input class="form-check-input mr-3" type="radio" wire:model="office_details"
                                       id="exampleRadios3" value="2">
                                <label class="form-check-label" for="exampleRadios3">
                                    حقیقی
                                </label>
                            </div>
                        </div>
                        @if ($errors->has("office_details"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('office_details') }}</span>
                                </ul>
                            </div><br/>
                        @endif
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
                        <input type="text" class="form-control" id="exampleInputEmail2" wire:model="first_name"
                               aria-describedby="emailHelp">
                        @if ($errors->has("first_name"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('first_name') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                    </div>
                    <div class="col-4 form-group">
                        <label for="exampleInputEmail23">نام خانوادگی</label>
                        <input type="text" class="form-control" id="exampleInputEmail23" wire:model="last_name"
                               aria-describedby="emailHelp">
                        @if ($errors->has("last_name"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('last_name') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                    </div>

                    <div class="col-4 form-group">
                        <label for="national_card_series">سریال کارت ملی یا کد پیگیری</label>
                        <input type="text" class="form-control" id="national_card_series"
                               wire:model="national_card_series" aria-describedby="emailHelp">
                        @if ($errors->has("national_card_series"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('national_card_series') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4 form-group">
                        <label for="national_code">کد ملی مدیر</label>
                        <input type="text" class="form-control" id="national_code" wire:model="national_code"
                               aria-describedby="emailHelp">
                        @if ($errors->has("national_code"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('national_code') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                    </div>
                    <div class="col-4 form-group">
                        <label for="father_name">نام پدر</label>
                        <input type="text" class="form-control" id="father_name" wire:model="father_name"
                               aria-describedby="emailHelp">
                        @if ($errors->has("father_name"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('father_name') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                    </div>

                    <div class="col-4 form-group">
                        <label for="phone">شماره ثابت</label>
                        <input type="text" class="form-control" id="phone" wire:model="phone"
                               aria-describedby="emailHelp">
                        @if ($errors->has("phone"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('phone') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4 form-group">
                        <label for="birth_certificate_number">شماره شناسنامه</label>
                        <input type="text" class="form-control" id="birth_certificate_number"
                               wire:model="birth_certificate_number" aria-describedby="emailHelp">
                        @if ($errors->has("birth_certificate_number"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('birth_certificate_number') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                    </div>
                    <div class="col-4 form-group">
                        <label for="birth_certificate_series">سری شناسنامه</label>
                        <input type="text" class="form-control" id="birth_certificate_series"
                               wire:model="birth_certificate_series" aria-describedby="emailHelp">
                        @if ($errors->has("birth_certificate_series"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('birth_certificate_series') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                    </div>

                    <div class="col-4 form-group">
                        <label for="birth_certificate_serial">سریال شناسنامه</label>
                        <input type="text" class="form-control" id="birth_certificate_serial"
                               wire:model="birth_certificate_serial" aria-describedby="emailHelp">
                        @if ($errors->has("birth_certificate_serial"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('birth_certificate_serial') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 form-group">
                        <label for="birthday">تاریخ تولد</label>
                        <input type="text" class="form-control" id="birthday" placeholder="yyyy/mm/dd"
                               wire:model="birthday" aria-describedby="emailHelp">
                        @if ($errors->has("birthday"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('birthday') }}</span>
                                </ul>
                            </div><br/>
                        @endif
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
                        <select class="form-control form-control" id="province" wire:model="province">
                            <option selected disabled>لطفا انتخاب کنید</option>
                            @foreach($provinces as $province)
                                <option value="{{$province->name}}">{{$province->name}}</option>
                            @endforeach


                        </select>
                        @if ($errors->has("province"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('province') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                    </div>
                    <div class="col-4 form-group">
                        <label for="city">شهر</label>
                        <select class="form-control form-control" id="city" wire:model="city">
                            <option selected disabled>لطفا انتخاب کنید</option>
                            @foreach($cities as $city)
                                <option value="{{$city->name}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has("city"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('city') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                    </div>
                    <div class="col-4 form-group">
                        <label for="address">آدرس</label>
                        <input type="text" class="form-control" id="address" wire:model="address"
                               aria-describedby="emailHelp">
                        @if ($errors->has("address"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('address') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4 form-group">
                        <label for="postal_code">کد پستی</label>
                        <input type="text" class="form-control" id="postal_code" wire:model="postal_code"
                               aria-describedby="emailHelp">
                        @if ($errors->has("postal_code"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('postal_code') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                    </div>
                    <div class="col-4 form-group">
                        <label for="mobile">شماره همراه مدیر دفتر</label>
                        <input type="text" class="form-control" id="mobile" wire:model="mobile"
                               aria-describedby="emailHelp">
                        @if ($errors->has("mobile"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('mobile') }}</span>
                                </ul>
                            </div><br/>
                        @endif
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
                                <input class="form-check-input mr-3" type="radio" wire:model="has_card_reader"
                                       id="exampleRadios4" value="1" checked>
                                <label class="form-check-label" for="exampleRadios4">
                                    بله
                                </label>
                            </div>
                            <div class="col-6 form-check">
                                <input class="form-check-input mr-3" type="radio" wire:model="has_card_reader"
                                       id="exampleRadios3" value="0">
                                <label class="form-check-label" for="exampleRadios3">
                                    خیر
                                </label>
                            </div>
                        </div>
                        @if ($errors->has("has_card_reader"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('has_card_reader') }}</span>
                                </ul>
                            </div><br/>
                        @endif

                    </div>

                    <div class="col-4 form-group">
                        <label for="exampleInputEmail78">نام بانک دارای حساب</label>
                        <select class="form-control form-control" id="exampleInputEmail78" wire:model="bank">
                            <option disabled selected>لطفا انتخاب کنید</option>
                            <option value="بانک ملّی">بانک ملّی</option>
                            <option value="بانک سپه">بانک سپه</option>
                            <option value="بانک صنعت و معدن">بانک صنعت و معدن</option>
                            <option value="بانک کشاورزی">بانک کشاورزی</option>
                            <option value="بانک مسکن">بانک مسکن</option>
                            <option value="بانک توسعه صادرات ایران ">بانک توسعه صادرات ایران</option>
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
                        @if ($errors->has("bank"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('bank') }}</span>
                                </ul>
                            </div><br/>
                        @endif

                    </div>
                    <div class="col-4 form-group">
                        <label for="account_number">شماره حساب</label>
                        <input type="text" class="form-control" placeholder="*************" id="account_number"
                               wire:model="account_number" aria-describedby="emailHelp">
                        @if ($errors->has("account_number"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('account_number') }}</span>
                                </ul>
                            </div><br/>
                        @endif

                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-4 form-group" style="direction: ltr">
                        <label for="fgf4">شماره شبا</label>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="iban-addon1">IR</span>
                            </div>
                            <input type="text" class="form-control" placeholder="***********" wire:model="iban"
                                   id="iban" aria-label="Username" aria-describedby="basic-addon1">

                        </div>
                        @if ($errors->has("iban"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('iban') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                    </div>
                    <div class="col-4 form-group">
                        <label for="tax_code">کد رهگیری مالیاتی</label>
                        <input type="text" class="form-control" placeholder="545****145" wire:model="tax_code"
                               id="tax_code" aria-describedby="emailHelp">
                        @if ($errors->has("tax_code"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('tax_code') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                    </div>
                </div>
                <div class="row form-title-section">
                    <div class="title-content">
                        بارگذاری مدارک
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <div class="col-4 ">
                        <label style="display: block">پروانه دفتر</label>
                        @if ($office_permit)
                            <img src="{{ $office_permit->temporaryUrl() }}" width="100%" height="auto" style="max-height: 300px;margin: 25px 0">
                        @endif
                        <label for="office_permit" class="btn btn-outline-success upload-btn">بارگذاری فایل<i
                                    class="fa fa-upload mr-2" aria-hidden="true"></i></label>
                        @if ($errors->has("office_permit"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('office_permit') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                        <input type="file" hidden wire:model="office_permit" id="office_permit">
                    </div>

                    <div class="col-4 ">
                        <label style="display: block">کارت ملی صاحب پروانه</label>
                        @if ($national_card)
                            <img src="{{ $national_card->temporaryUrl() }}" width="100%" height="auto" style="max-height: 300px;margin: 25px 0">
                        @endif
                        <label for="national_card" class="btn btn-outline-success upload-btn">بارگذاری فایل<i
                                    class="fa fa-upload mr-2" aria-hidden="true"></i></label>
                        @if ($errors->has("national_card"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('national_card') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                        <input type="file" hidden wire:model="national_card" id="national_card">
                    </div>
                    <div class="col-4 ">
                        <label style="display: block">تصویری از حساب بانکی</label>
                        @if ($bank_account)
                            <img src="{{ $bank_account->temporaryUrl() }}" width="100%" height="auto" style="max-height: 300px;margin: 25px 0">
                        @endif
                        <label for="bank_account" class="btn btn-outline-success upload-btn">بارگذاری فایل<i
                                    class="fa fa-upload mr-2" aria-hidden="true"></i></label>
                        @if ($errors->has("bank_account"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('bank_account') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                        <input type="file" hidden wire:model="bank_account" id="bank_account">
                    </div>

                </div>

                <div class="row text-center mt-4">
                    <div class="col-4 ">
                        <label style="display: block">تصویر پشت کارت ملی</label>
                        @if ($national_card_back)
                            <img src="{{ $national_card_back->temporaryUrl() }}" width="100%" height="auto" style="max-height: 300px;margin: 25px 0">
                        @endif
                        <label for="national_card_back" class="btn btn-outline-success upload-btn">بارگذاری فایل<i
                                    class="fa fa-upload mr-2" aria-hidden="true"></i></label>
                        @if ($errors->has("national_card_back"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('national_card_back') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                        <input type="file" hidden wire:model="national_card_back" id="national_card_back">
                    </div>

                    <div class="col-4 ">
                        <label style="display: block"> تعهد نامه</label>
                        <a href="https://tkpishkhan.ir/download/commitment-letter.pdf" target="_blank"
                           class="btn btn-warning upload-btn">دانلود تعهد نامه<i class="fa fa-upload mr-2"
                                                                                 aria-hidden="true"></i></a>
                    </div>

                    <div class="col-4 ">
                        <label style="display: block">تصویر تعهد نامه</label>
                        @if ($commitment_letter)
                            <img src="{{ $commitment_letter->temporaryUrl() }}" width="100%" height="auto" style="max-height: 300px;margin: 25px 0">
                        @endif
                        <label for="commitment_letter" class="btn btn-outline-success upload-btn">بارگذاری فایل<i
                                    class="fa fa-upload mr-2" aria-hidden="true"></i></label>
                        @if ($errors->has("commitment_letter"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('commitment_letter') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                        <input type="file" hidden wire:model="commitment_letter" id="commitment_letter">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-6 form-group">
                        <label for="description">توضیحات</label>
                        <textarea class="form-control" id="description" wire:model="description"
                                  aria-describedby="emailHelp"
                                  style="height: 200px">توضیحات خود را اینجا بنویسید</textarea>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label mr-3" for="exampleCheck1">صحت اطلاعات فوق و قوانین بانکداری و
                            قرارداد ارائه خدمات دفاتر پیشخوان دولت مورد تایید اینجانب می باشد</label>
                    </div>
                </div>
                <div class="row mt-4">

                    <div class="col-6 form-group">
                        <label for="captcha" style="display: block">عبارت امنیتی</label>
                        <div class="row mb-3 mr-1">
                            <span>{!! captcha_img() !!}</span>
                        </div>
                        <input id="captcha" type="text" class="form-control mb-4" placeholder="کد امنیتی را وارد کنید"
                               wire:model.defer="captcha">
                        <p><b>*</b> متن عبارت امنیتی به حروف بزرگ و کوچک حساس می باشد</p>
                        @if ($errors->has("captcha"))
                            <div class="alert alert-danger text-right">
                                <ul>
                                    <span class="error">{{ $errors->first('captcha') }}</span>
                                </ul>
                            </div><br/>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-success"      @if ($errors->any()){{"disabled"}}@endif>
                    ثبت درخواست
                </button>
                <a href="/" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                    بازگشت
                </a>


            </form>

        </div>
    </div>
</div>
