@extends("email-layout")
@section("content")
<h2>You forgot your password!</h2>
<p>We've got you covered, though!</p>
<p>Click here to reset your password: {{ url('password/reset/'.$token) }}</p>
<p>This link will work for 1 hour.</p>
@stop