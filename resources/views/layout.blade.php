<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="/css/app.css">
    <title>Camp Schwartzelrod</title>
</head>
<body data-spy="scroll" data-target="#main-site-nav" data-offset="50">
@include("header")
<div id="main-content">
    @yield("content")
</div>
@include("footer")
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/main.js"></script>
@yield('scripts')
</html>
