<header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="{{ url('dist/img/ct_fav.png') }}" class="" alt="User Image"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="{{ url('dist/img/connectThat.png') }}" class="" alt="User Image"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
               
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/storage/avatars/{{ \Auth::user()->image }}" class="user-image" alt="User Image">
                        <span class="hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
                            <img class="rounded-circle" src="/storage/avatars/{{ \Auth::user()->image }}" />

                            <p>
                               {{auth()->user()->first_name}}
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->

                        <li class="user-footer">
                            <div class="pull-left">
                            @if (Auth::user()->hasRole("ROLE_ADMIN"))
                                <a href="{!! url('admin/profile') !!}" class="btn btn-default btn-flat">Profile</a>
                             @else

                                <a href="{!! url('hospital/profile') !!}" class="btn btn-default btn-flat">Profile</a>

                             @endif
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                
            </ul>
        </div>
    </nav>
</header>
