<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">وبلاگ</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if(auth()->check())
                    <li>
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">مطالب <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/admin/posts">نمایش</a></li>
                                    <li><a href="/admin/posts/create">ایجاد</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">دسته بندی <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/admin/categories">نمایش</a></li>
                                    <li><a href="/admin/categories/create">ایجاد</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="/admin/comments">نظرات</a></li>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">کاربران <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/users">نمایش</a></li>
                                <li><a href="/admin/users/create">ایجاد</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">خبرنامه<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/newsletters">نمایش</a></li>
                                <li><a href="/admin/newsletters/create">اضافه کردن</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">اعضا خبرنامه<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/newsletter_members">نمایش</a></li>
                                <li><a href="/admin/newsletter_members/create">اضافه کردن</a></li>
                            </ul>
                        </li>
                    </ul>
                    <li><a href="/admin/logout">خروج</a></li>
                @else
                    <li><a href="{{url('/admin/login')}}">ورود</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>