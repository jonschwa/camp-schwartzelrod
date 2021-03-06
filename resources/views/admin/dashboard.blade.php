@extends('layout')
@section('content')
    <div class="container-fluid" id="admin-section">
        <div class="row">
            <div class="col-md-12 txt-centered">
                <p class="clarendon-headline green">Admin Section</p>
            </div>
        </div>
    @include('admin._rsvp')
    <hr width="100%">
    @include('admin._guests')
    <hr width="100%">
    @include('admin._activities')
    <hr width="100%">
    @include('admin._user')
    @include('admin._user-table')
    </div>

@stop