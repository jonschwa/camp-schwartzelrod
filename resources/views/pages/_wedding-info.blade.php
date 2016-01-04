<div class="row">
    <a name="wedding-info"></a>
    <div class="main-page-content-block" id="wedding-info">
        <div id="wedding-info-section">
            <div id="wedding-info-content">
                <div class="row">
                    @foreach($weddingInfoContent as $key => $content)
                        <div class="col-sm-4">
                            <div class="content-block">
                                <img class="content-image img-circle" src="{{ $content['img'] }}">
                                <p class="content-title">{{ $content['title'] }}</p>
                                @if(isset($content['subtitle']))
                                    <p class="content-subtitle">{!! $content['subtitle'] !!}</p>
                                @endif
                                <div class="content-body">
                                    <p>{!! $content['body'] !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>