{{-- TODO: Is this necessary? --}}
@extends("layout")

@section("content")
<div id="mainpage" isMainPage=true style="display:none;"></div>
    @include("pages._big-logo-splash")
    <a id="our-story-anchor" name="our-story"></a>
    @include("pages._our-story")
    <a id="wedding-info-anchor" name="wedding-info"></a>
    @include("pages._wedding-datetime")
    @include("pages._wedding-info")
    <a id="vt-info-anchor"></a>
    @include("pages._vt-info")
    <a id="lodging-info-anchor"></a>
    @include("pages._lodging-info")
    <a id="rsvp-info-anchor"></a>
    @include("pages._rsvp")
@stop