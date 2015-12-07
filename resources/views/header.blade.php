@section("header")
    <header class="navbar navbar-static-top main-header" id="top" role="banner">
        <div class="container-fluid">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" class="navbar-brand">Camp Schwartzelrod</a>
            </div>
            <nav id="main-navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::user())
                        <li>
                            <p class="navbar-text">Logged in as {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                        </li>
                        <li>
                            <a href="/logout">Log Out</a>
                        </li>
                        <li>
                            <a href="/status">Status</a>
                        </li>
                    @else
                        <li>
                            <a href="/login">Log In</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>
@show