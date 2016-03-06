<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<a href="{{ URL::to('/') }}"><img src="{{ URL::to('/img/email-header.jpg') }}" style="width:100%"/></a>
<div id="email-body">
    @yield("content")
</div>
</body>
</html>
