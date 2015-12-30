<a name="our-story"></a>
<div class="main-page-content-block" id="our-story">
    <div class="row">
        <div class="col-md-12" id="our-story-section">
            <div id="our-story-content" class="container-fluid">
                <div class="content-text-head">Our Story</div>
                @foreach($ourStoryContent as $key => $content)
                    @if($key % 2 == 0)
                        <div class="row">
                            @endif
                            <div class="col-md-6">
                                <img src="{{ $content['img'] }}">
                                <p>{{ $content['body'] }}</p>
                                <p>{{ $key % 2 }}</p>
                            </div>
                            @if($key % 2 !== 0)
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>