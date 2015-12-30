<a name="lodging-info"></a>
<div class="main-page-content-block" id="lodging-info">
    <div class="row">
        <div class="col-md-12" id="lodging-info-section">
            <div id="lodging-info-content" class="container-fluid">
                <div class="content-text-head">Lodging Info</div>
                @foreach($lodgingInfoContent as $key => $content)
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