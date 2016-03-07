{{$user->name}} has opted out.
They wanted to be contacted by {{$user->contact_preference}}
@if($user->contact_preference == 'email')
    {{$user->email}}
@else
    {{$user->phone}}
@endif

@if(!is_null($user->rsvp->comment))
    <p>They had this to say:</p>
    <p>{{$user->rsvp->comment}}</p>
@endif