@section("header")
    <a class="page-top" name="page-top"></a>
    <header class="navbar navbar-fixed-top main-header" id="top" role="banner">
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
                    <span>
                        <img id="nav-camp-logo" src="/img/camp-schwartelrod-logo-no-text.png">
                    </span>
                    <span>
                        <p id="nav-camp-name">Camp<br />Schwartzelrod</p>
                    </span>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <span>
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
                                <a class="highway-subhead" href="/#lodging-info" id="nav-lodging-info-link">Acommodations</a>
                            </li>
                            <li>
                                @if(Auth::user())
                                    <a class="highway-subhead" href="/status">RSVP</a>
                                @else
                                    <a class="highway-subhead" href="/#rsvp" id="nav-rsvp-link">RSVP</a>
                                @endif
                            </li>
                        </ul>
                    </span>
                    <span>
                        @if(Auth::user())
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <p class="highway-subhead" class="navbar-text">Logged in as {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <a href="/logout">(Log Out)</a></p>
                                </li>
                            </ul>
                        @else
                            <form class="navbar-form navbar-right form-group-sm" id="form-nav-login">
                                <div class="form-group">
                                    <input id="form-nav-login-email" type="text" class="form-control" placeholder="Email">
                                    <input id="form-nav-login-password" type="password" class="form-control" placeholder="Password">
                                </div>
                                <button type="submit" id="nav-login-submit" class="btn btn-xs">Log In</button>
                            </form>
                        @endif
                    </span>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </header>
    <div class="alert alert-danger" id="nav-error-container" role="alert">
        <button id="btn-nav-error-hide" type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div id="nav-error-body">There was an error.</div>
    </div>
@show