<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ثبت کاربر</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/assets/js/bootstrap.min.js" defer></script>

</head>
<body>
<div class="container">
    <div class="row  justify-content-center mt-5 register-form text-center">
        <h3>ثبت کاربر جدید</h3>
        <div class="col-12">
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
        </div>
        <form action="{{route('create.user')}}" method="POST" class="user-submit-form col-12" >
            @csrf
            <div class="row mt-4">
                <div class="col-12 col-md-4 form-group">
                    <label for="first_name">نام</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="emailHelp">
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label for="last_name">نام خانوادگی</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="emailHelp">
                </div>

                <div class="col-12 col-md-4 form-group">
                    <label for="national_code">کد ملی</label>
                    <input type="text" class="form-control" id="national_code" name="national_code" aria-describedby="emailHelp">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 col-md-4 form-group">
                    <label for="phone">شماره همراه</label>
                    <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp">
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label for="job">سمت :</label>
                    <input type="text" class="form-control" id="job" name="job" aria-describedby="emailHelp">
                </div>

            </div>

            <button class="btn btn-success mt-3">ثبت کاربر</button>
        </form>
    </div>
</div>
</body>
</html>
