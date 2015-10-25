@extends("layout")

@section("content")
    <div class="container">
       <h1>Welcome, {{ $user->email }}!</h1>
        <p>Please verify all the guests who will be attending.</p>
            @foreach($user->guests as $guest)
                <div class="guest-info">
                    <h2>{{ $guest->first_name }} {{ $guest->last_name }}</h2>
                    @if($guest->is_adult == 1)
                        <p>Adult</p>
                    @else
                        <p>Child</p>
                    @endif
                </div>
            @endforeach
    </div>
@stop

