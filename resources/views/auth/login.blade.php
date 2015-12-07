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
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-3"></div>
        <div id="login" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="text-center" style="padding-bottom: 10px;">
                <img src="{{asset('img/logo.png')}}" style="width:120px;padding-bottom: 30px">
                <h5>ورود به بخش مدیریت</h5>
            </div>
            <div class="form-group">
                <h4 class="text-center text-danger">
                    {{ $message or '' }}
                </h4>
            </div>
            <form action="login" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                {{-- .form-group --}}
                @if ($errors && !empty($errors->first('email')))
                    <div class="form-group has-error">
                        <input type="text" class="form-control" name="email" placeholder="نام کاربری" value="{{old('email')}}">
                        <label class="control-label small" style="padding-top: 5px">{{ ($errors)?$errors->first('email'):'' }}</label>
                    </div>
                @else
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="نام کاربری" value="{{old('email')}}">
                    </div>
                @endif

                {{-- .form-group --}}
                @if ($errors && !empty($errors->first('password')))
                    <div class="form-group has-error">
                        <input type="password" class="form-control" name="password" placeholder="گذرواژه">
                        <label class="control-label small" style="padding-top: 5px">{{ ($errors)?$errors->first('password'):'' }}</label>
                    </div>
                @else
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="گذرواژه">
                    </div>
                @endif

                {{-- .form-group --}}
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" name="submit">ورود</button>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="hidden" name="reminder" value="0">
                        <input type="checkbox" name="reminder" value="1"> مرا به خاطر بسپار
                    </label>
                    <a href="{{url('admin/password/email')}}" class="pull-left">گذرواژه ام را فراموش کرده ام</a>
                </div>
            </form>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-3"></div>
    </div>
</div>
</body>
</html>
