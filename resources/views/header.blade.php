@section("header")
    <a class="page-top" name="page-top"></a>
    <header class="navbar navbar-fixed-top main-header" id="top" role="banner">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#camp-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="\">
                        <span>
                            <span id="nav-camp-logo" class="icon-camp-logo-no-text"></span>
                        </span>
                        <span>
                            <p id="nav-camp-name">Camp<br />Schwartzelrod</p>
                        </span>
                    </a>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="camp-navbar-collapse-1">
                    <span class="navbar-left">
                        <ul class="nav navbar-nav">
                            <li>
                                <a class="highway-subhead" href="/#our-story" id="nav-our-story-link">History</a>
                            </li>
                            <li>
                                <a class="highway-subhead" href="/#wedding-info" id="nav-wedding-info-link">Wedding</a>
                            </li>
                            <li>
                                <a class="highway-subhead" href="/#vt-info" id="nav-vt-info-link">Location</a>
                            </li>
                            <li>
                                <a class="highway-subhead" href="/#lodging-info" id="nav-lodging-info-link">Accommodations</a>
                            </li>

                            @if(Auth::user())
                            <li>
                                <a class="highway-subhead" href="/status">RSVP</a>
                            </li>
                            @else
                            <li>
                                <a class="highway-subhead" href="/#rsvp" id="nav-rsvp-link">RSVP</a>
                            </li>
                            <li>
                                <a class="highway-subhead" id="login-form-toggle">Log In</a>
                            </li>
                            @endif

                        </ul>
                    </span>
                    <span class="navbar-right">
                        @if(Auth::user())
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <p class="highway-subhead" class="navbar-text">Logged in as {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <a href="/logout">(Log Out)</a></p>
                                </li>
                            </ul>
                        @else

                        @endif
                    </span>
                    {{--<div id="form-nav-login-collapsed">--}}
                        {{--<div id="nav-login-container">--}}
                            {{--<form class="navbar-form form-group-sm">--}}
                                {{--<div class="form-group">--}}
                                    {{--<input id="form-nav-login-email" type="text" class="form-control" placeholder="Email">--}}
                                    {{--<input id="form-nav-login-password" type="password" class="form-control" placeholder="Password">--}}
                                {{--</div>--}}
                                {{--<button type="submit" id="nav-login-submit" class="btn btn-xs">Log In</button>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </header>
    @if(!Auth::user())
    <div id="form-nav-login" class="closed">
        <div id="nav-login-container">
            <form class="navbar-form form-group-sm">
                <div class="form-group">
                    <input id="form-nav-login-email" type="text" class="form-control" placeholder="Email">
                    <input id="form-nav-login-password" type="password" class="form-control" placeholder="Password">
                </div>
                <button type="submit" id="nav-login-submit" class="btn btn-xs">Log In</button>
            </form>
        </div>
    </div>
    <div class="alert alert-danger" id="nav-error-container" role="alert">
        <button id="btn-nav-error-hide" type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div id="nav-error-body">There was an error.</div>
    </div>
    @endif
@show