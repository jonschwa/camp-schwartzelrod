{{-- TODO: Is this necessary? --}}
@extends("layout")

@section("content")
<div id="mainpage" isMainPage=true style="display:none;"></div>
    @include("pages._big-logo-splash")
    @include("pages._our-story")
    @include("pages._wedding-datetime")
    @include("pages._wedding-info")
    @include("pages._vt-info")
    @include("pages._lodging-info")
    @if(!Auth::user())
        @include("pages._rsvp")
    @endif
@stop