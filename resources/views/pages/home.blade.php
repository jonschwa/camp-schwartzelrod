{{-- TODO: Is this necessary? --}}
@extends("layout")

@section("content")
<div id="mainpage" isMainPage=true style="display:none;"></div>
<div class="container-fluid">
    @include("pages._big-logo-splash")
    @include("pages._wedding-datetime")
    @include("pages._our-story")
    @include("pages._wedding-info")
    @include("pages._vt-info")
    @include("pages._lodging-info")
    @include("pages._rsvp")
</div>
@stop