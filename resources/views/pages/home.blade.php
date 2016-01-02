{{-- TODO: Is this necessary? --}}
@extends("layout")

@section("content")
<div id="mainpage" isMainPage=true style="display:none;"></div>
<div class="container-fluid">
    @include("pages._big-logo-splash")
    @include("pages._wedding-info")
    @include("pages._our-story")
    @include("pages._lodging-info")

    <div class="container">
        <h1>This will be a real thing soon!</h1>
        <p><a href="/invitation">Invitation page</a></p>
        <p><a href="/test_invites">Invitation codes</a></p>
    </div>
</div>
@stop