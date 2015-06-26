<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Marx</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        

        <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>

                @else
                    @if(Auth::user())

                    <li class="dropdown">
                        <a class="dropdown-toggle"
                           type="button"
                           id="userDropdown"
                           data-toggle="dropdown"
                           aria-expanded="true"
                           href="#">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="userDropdown">
                            <li role="presentation">
                                <a role="menuitem"
                                   tabindex="-1"
                                   href="{{ url('auth/logout') }}">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
            </ul>

        </div>
    </div>
</nav>