<a name="wedding-info"></a>
<div class="main-page-content-block" id="wedding-info">
    <div class="row">
        <div class="col-md-12" id="wedding-info-section">
            <div id="wedding-info-content" class="container-fluid">
                <div class="content-text-head">Wedding Info</div>
                @foreach($weddingInfoContent as $key => $content)
                    @if($key % 3 == 0 && $key != 2)
                        <div class="row">
                    @endif
                            <div class="col-md-4">
                                <img src="{{ $content['img'] }}">
                                <p>{{ $content['body'] }}</p>
                                <p>{{ $key % 3 }}</p>
                            </div>
                    @if($key % 3 == 0 && $key != 0)
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>