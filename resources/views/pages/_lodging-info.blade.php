<a name="lodging-info"></a>
<div class="container-fluid main-page-content-block" id="lodging-info">
    <h1>Lodging Info</h1>
    @foreach($lodgingInfoContent as $key => $content)
        {{ $key }}
        <div class="row">
            <img src="{{ $content['img'] }}">
            <p>{{ $content['body'] }}</p>
        </div>
    @endforeach
</div>
