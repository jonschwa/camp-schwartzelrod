<div id="wedding-info-header">
    {{--<img src="/img/abnaki-google-earth.jpg">--}}
    <img src="/img/greetings.jpg">
</div>
<div class="container-fluid">
    <div class="main-page-content-block" id="wedding-info">
        <div id="wedding-info-section">
            <div id="wedding-info-content">
                <div class="row">
                    @foreach($weddingInfoContent as $key => $content)
                        <div class="col-md-4">
                            <div class="content-block">
                                <p class="clarendon-subhead green">{{ $content['title'] }}</p>
                                @if(isset($content['subtitle']))
                                    <p class="highway-subhead">{!! $content['subtitle'] !!}</p>
                                @endif
                                <div class="content-body">
                                    <p class="grey">{!! $content['body'] !!}</p>
                                </div>
                                @if(isset($content['post-header']))
                                    <p class="highway-subhead">{!! $content['post-header'] !!}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
