<a name="wedding-info"></a>
<div class="container-fluid main-page-content-block" id="wedding-info">
    <h1>Wedding Info</h1>
    @foreach($weddingInfoContent as $key => $content)
        {{ $key }}
        <div class="row">
            <img src="{{ $content['img'] }}">
            <p>{{ $content['body'] }}</p>
        </div>
    @endforeach
</div>