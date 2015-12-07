<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{$title or 'وبلاگ'}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link rel="stylesheet" href='{{asset("css/vendors/bootstrap.min.css")}}'/>
    <link rel="stylesheet" href='{{asset("css/vendors/bootstrap-rtl.min.css")}}'/>
    <link rel="stylesheet" href='{{asset("css/vendors/font-awesome.min.css")}}'/>
    <link rel="stylesheet" href='{{asset("css/icon.css")}}'/>
    <link rel="stylesheet" href='{{asset("css/app.css")}}'/>

    <script src='{{asset("js/vendors/jquery.min.js")}}'></script>
    <script src='{{asset("js/vendors/bootstrap.min.js")}}'></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

@include('includes.header')

@yield('content')

@include('includes.footer')

</body>
</html>
