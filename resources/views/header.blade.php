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
                    <span id="hacky-nav-logo-container">
                        <a href="\">
                            <span id="nav-camp-logo" class="icon-camp-logo-no-text"></span>
                            <span id="nav-camp-name">Camp<br />Schwartzelrod<span>
                        </a>
                    </span>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="camp-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a class="highway-subhead nav-link" href="/#our-story" id="nav-our-story-link">History</a>
                        </li>
                        <li>
                            <a class="highway-subhead nav-link" href="/#wedding-info" id="nav-wedding-info-link">Wedding</a>
                        </li>
                        <li>
                            <a class="highway-subhead nav-link" href="/#vt-info" id="nav-vt-info-link">Location</a>
                        </li>
                        <li>
                            <a class="highway-subhead nav-link" href="/#lodging-info" id="nav-lodging-info-link">Accommodations</a>
                        </li>
                    </ul>
                    @if(Auth::user())
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <p class="highway-subhead nav-link"><span class="nav-logged-in-text">Logged in as {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span> <a href="/status">View RSVP</a> <span class="yellow"> | </span><a href="/logout">Log Out</a></p>
                            </li>
                        </ul>
                    @else
                        <ul class="nav navbar-nav navbar-right">
                            <li data-toggle="tooltip" data-placement="bottom" title="Wait! Make sure you scroll down and read through this page before RSVPing">
                                <a class="highway-subhead nav-link brown-tooltip" href="/#rsvp" id="nav-rsvp-link">RSVP</a>
                            </li>
                            <li>
                                <a class="highway-subhead nav-link" href="/login">Log In</a>
                            </li>
                        </ul>
                    @endif
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </header>
@show