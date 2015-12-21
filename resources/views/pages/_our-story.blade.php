<a name="our-story"></a>
<div class="container-fluid main-page-content-block" id="our-story">
    <h1>Our Story</h1>
    @foreach($ourStoryContent as $key => $content)
        {{ $key }}
        <div class="row">
            <img src="{{ $content['img'] }}">
            <p>{{ $content['body'] }}</p>
        </div>
    @endforeach
</div>
