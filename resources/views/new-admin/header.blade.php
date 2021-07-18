<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-file-text-o"></i>&nbsp; مطالب
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="/admin/posts">لیست مطالب</a></li>
                                    <li><a href="/admin/posts/create">ایجاد مطلب جدید</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="/admin/categories">لیست دسته بندی های مطالب</a></li>
                                    <li><a href="/admin/categories/create">ایجاد دسته مطالب جدید</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="/admin/comments">لیست نظرات</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>&nbsp;خبرنامه
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/newsletters">لیست خبرنامه ها</a></li>
                                <li><a href="/admin/newsletters/create">ایجاد خبرنامه جدید</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/admin/newsletter_members">لیست اعضاء خبرنامه</a></li>
                                <li><a href="/admin/newsletter_members/create">اضافه کردن عضو جدید</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ticket"></i>&nbsp;سیستم پشتیبانی
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/tickets">لیست تیکت‌ها</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/admin/ticket-categories">لیست دسته بندی تیکت‌ها</a></li>
                                <li><a href="/admin/ticket-categories/create">ایجاد دسته تیکت جدید</a></li>
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