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
        <div id="login" class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
            <div class="text-center" style="padding-bottom: 10px;">
                <img src="{{asset('img/logo.jpg')}}" style="width:250px;padding-bottom: 30px">
                <h5>تغییر گذرواژه</h5>
            </div>
            <div class="form-group">
                <h4 class="text-center text-danger">
                    {{ $message or '' }}
                </h4>
            </div>
            <form action="login" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="نام کاربری">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password-new" placeholder="گذرواژه جدید">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password-replay" placeholder="تکرار گذرواژه جدید">
                </div>
                @if (count($errors) > 0)
                    <div class="text-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <button class="btn btn-default pull-right" type="submit" name="submit" style="width: 30%">انصراف</button>
                    <button class="btn btn-primary pull-left" type="submit" name="submit" style="width: 65%">تغییر گذرواژه</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
