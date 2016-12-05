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
            <a class="navbar-brand" href="{{url('/')}}"> <i class="fa fa-globe"></i> وبلاگ</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if(auth()->check())
                    <li>
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-file-text-o"></i>&nbsp; مطالب
                                    <span class="caret"></span>
                                </a>
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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-folder-open-o"></i>&nbsp;دسته بندی
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="/admin/categories">نمایش</a></li>
                                    <li><a href="/admin/categories/create">ایجاد</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/admin/comments">
                            <i class="fa fa-comments-o"></i>&nbsp;نظرات
                        </a>
                    </li>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i>&nbsp;کاربران
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/users">نمایش</a></li>
                                <li><a href="/admin/users/create">ایجاد</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>&nbsp;خبرنامه
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/newsletters">نمایش</a></li>
                                <li><a href="/admin/newsletters/create">اضافه کردن</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-users"></i>&nbsp;اعضا خبرنامه
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/newsletter_members">نمایش</a></li>
                                <li><a href="/admin/newsletter_members/create">اضافه کردن</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-university"></i>&nbsp;دپارتمان
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/departments">نمایش</a></li>
                                <li><a href="/admin/departments/create">ایجاد</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ticket"></i>&nbsp;تیکت
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/newsletter_members">نمایش</a></li>
                                <li><a href="/admin/newsletter_members">ایجاد</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-area-chart"></i>&nbsp;چارت سازمانی
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/departments_users">نمایش</a></li>
                                <li><a href="/admin/departments_users/create">ایجاد</a></li>
                            </ul>
                        </li>
                    </ul>
                    <li><a href="/admin/logout"><i class="fa fa-sign-out"></i>&nbsp;خروج</a></li>
                @else
                    <li><a href="{{url('/admin/login')}}">ورود</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>