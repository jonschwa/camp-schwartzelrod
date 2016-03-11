@extends("layout")
@section("content")
<div id="error-page-container">
    <div class="container-fluid">
        <div class="row" id="error-animal-row">
            <div class="col-sm-4 col-xs-4">
                <img class="img-circle" src="/img/atlas-computer.jpg" />
            </div>
            <div class="col-sm-4 col-xs-4">
                <img class="img-circle" src="/img/escher-computer.jpg" />
            </div>
            <div class="col-sm-4 col-xs-4">
                <img class="img-circle" src="/img/lola-computer.jpg" />
            </div>
        </div>
        <div class="row">
            <p id="really-big-status-code" class="clarendon-headline green">404</p>
        </div>
        <div class="row">
            <p class="highway-headline">That's internet for "this page doesn't exist"</p>
        </div>
    </div>
</div>
@stop