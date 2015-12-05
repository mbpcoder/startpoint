@include('includes.resource')
        <!doctype html>
<html>
<head>
    @yield('AdminResource')
    @yield('GeneralResource')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title or 'ورود'}}</title>
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
