<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$pageTitle or 'مدیریت وبلاگ'}}</title>
    <link rel="stylesheet" href='{{asset("css/vendors/bootstrap.min.css")}}'/>
    <link rel="stylesheet" href='{{asset("css/vendors/bootstrap-rtl.min.css")}}'/>
    <link rel="stylesheet" href='{{asset("css/vendors/font-awesome.min.css")}}'/>
    <link rel="stylesheet" href='{{asset("css/admin.min.css")}}'/>

    <script src='{{asset("js/vendors/jquery.min.js")}}'></script>
    <script src='{{asset("js/vendors/bootstrap.min.js")}}'></script>
    <script src='{{asset("js/vendors/pasoon-date.min.js")}}'></script>
    <script src='{{asset("js/vendors/gridview.min.js")}}'></script>
</head>
<body>

@include('admin.header')

@yield('content')

</body>
</html>
