@extends('layout')
@section('content')
    <div class="container-fluid" id="admin-section">
        <div class="row">
            <div class="col-md-12 txt-centered">
                <p class="clarendon-headline green">Admin Section</p>
            </div>
        </div>
    @include('admin._rsvp')
    @include('admin._user')
    {{--@include('admin._guests')--}}
    </div>

@stop