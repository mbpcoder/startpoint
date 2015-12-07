<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$title or 'ورود'}}</title>
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

</head>
<body>
<style>
    body {
        margin-top: 70px;
    }
</style>
<div class="container-fluid">
    <div class="row centered">
        <div id="login" class="col-lg-12">
            <div class="text-center" style="padding-bottom: 10px;">
                <img src="{{asset('img/logo.jpg')}}" style="width:250px;padding-bottom: 30px">
                <h5>یادآوری گذرواژه</h5>
            </div>
            <div class="form-group text-center text-danger">
                <p>جهت یادآوری گذرواژه، یک لینک به آدرس پست الکترونیک شما ارسال گردید.</p>

                <p> لطفاً به صندوق پست الکترونیکی خود مراجعه کرده و بر روی لینک ارسال شده کلیک نمائید.</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
