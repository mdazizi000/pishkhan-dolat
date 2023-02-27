<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/iCheck/square/blue.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="/dist/css/bootstrap-rtl.min.css">
    <!-- template rtl version -->
    <link rel="stylesheet" href="/dist/css/custom-style.css">'

    <style>
        .tox:not(.tox-tinymce-inline) .tox-editor-header{
            direction: rtl;!important;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>


    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>tinymce.init({
            selector:'textarea',
            language:"fa_IR",
            plugins: "directionality image link table media",
            toolbar: "undo redo | styleselect | bold italic underline | link image alignleft aligncenter alignright ltr rtl",
            menubar: "",
            directionality: "rtl",
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true

    });
    </script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
@include('admin::layouts.navbar')
@yield('content')
@include('admin::layouts.sidebar')
{{-- Laravel Mix - JS File --}}
{{-- <script src="{{ mix('js/admin.js') }}"></script> --}}
@include('admin::layouts.footer')
<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
</div>
@include('admin::layouts.js')
<!-- ./wrapper -->
@yield('js')

</body>
</html>
