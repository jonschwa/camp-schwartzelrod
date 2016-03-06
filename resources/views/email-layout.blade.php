<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<img src="{{ URL::to('/img/email-header.jpg') }}" style="width:100%"/>
<div id="email-body">
    @yield("content")
</div>
</body>
</html>
