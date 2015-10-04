@extends("layout")

@section("content")
    <div class="container">
        <form action="savethedate" method="get">
            <div class="form-group">
                <input type="text" class="form-control giant-input" id="rsvp-code" name="rsvp-code" placeholder="Enter your code here">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
@stop