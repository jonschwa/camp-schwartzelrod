<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="/css/app.css">
    <title>Camp Schwartzelrod</title>
</head>
<body data-spy="scroll" data-target="#main-site-nav" data-offset="50">
@include("header")
<div id="main-content" class="content main-content">
    <div id="row">
        <div id="error-flash-container container-fluid" class="alert alert-danger container" role="alert" style="display:none">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span id="error-flash-message" class="alert-error-text"></span>
        </div>
    </div>
    @yield("content")
</div>
@include("footer")
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/main.js"></script>
@yield('scripts')
</html>
