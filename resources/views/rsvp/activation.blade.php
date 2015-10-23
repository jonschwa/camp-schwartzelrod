@extends("layout")

@section("content")
    <div class="container-fluid">
        <h1>Hello {{ $user->first_name }}!</h1>
        <p>[INSERT GENERIC TEXT ABOUT HOW HAPPY WE ARE TO HAVE YOU COME TO OUR WEDDING]</p>
        <p>We're trying to save paper and do paperless invitations - don't fuck this up for us!</p>
        <p>To start, lets get some information from you:</p>
        {!! Form::open(array('url' => '/', 'method' => 'post', 'id' => 'user-activate')) !!}
            <input type="hidden" id="user-id" value={{ $user->id }}>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="text" class="form-control" id="email" name="email" @if($user->email) value="{{ $user->email }}" @else "placeholder" = "Your Email" @endif >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Choose a password">
            </div>
            <div class="form-group">
                <label for="password-verify">Password</label>
                <input type="text" class="form-control" id="password-verify" name="password-verify" placeholder="Verify your password">
            </div>
            @if($guests)
                @foreach ($guests as $guest)
                    <div>
                        Guest: {{ $guest->first_name }} {{ $guest->last_name }}
                    </div>
                @endforeach
            @endif
            <button type="submit" class="btn btn-default">Submit</button>
        {!! Form::close() !!}
    </div>
@stop

@section('scripts')
    <script type="text/javascript">
        function post(url, data) {
            // Return a new promise.
            return new Promise(function(resolve, reject) {
                // Do the usual XHR stuff
                var req = new XMLHttpRequest();
                req.open('POST', url, true);

                req.onload = function() {
                    // This is called even on 404 etc
                    // so check the status
                    if (req.status == 200) {
                        // Resolve the promise with the response text
                        resolve(req.response);
                    }
                    else {
                        // Otherwise reject with the status text
                        // which will hopefully be a meaningful error
                        reject(Error(req.statusText));
                    }
                };

                // Handle network errors
                req.onerror = function() {
                    reject(Error("Network Error"));
                };

                // Make the request
                req.send(data);
            });
        }

        $("#user-activate").submit(function (event) {
            event.preventDefault();

            var data = new FormData();
            data.append('userid', $('#user-id').val());
            data.append('password', $('#user-password').val());
            data.append('password-verify', $('#user-password-verify').val());
            data.append('email', $('#email').val());

            post('/api/users/register', data).then(function (response) {
                console.log("Success!", response);
                if(response.status == 'ok') {
                    window.location.href = "/";
                }
                else {
                    window.alert('that didn\'t go well');
                }
            }, function (error) {
                console.error("Failed!", error);
            });
        });

    </script>
@endsection