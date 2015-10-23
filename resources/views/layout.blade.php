<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="/css/app.css">
    <title>Camp Schwartzelrod</title>
</head>
<body>
@include("header")
<div id="main-content" class="content main-content">
    @yield("content")
</div>
@include("footer")
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


@yield('scripts')
</html>
