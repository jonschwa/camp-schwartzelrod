<a name="wedding-info"></a>
<div class="main-page-content-block" id="wedding-info">
    <div class="row">
        <div class=".col-md-12" id="splash-wedding-info-header">
            <div id="wedding-info-content">
                <h1>Wedding Info</h1>
                @foreach($weddingInfoContent as $key => $content)
                    {{ $key }}
                    <div class="row">
                        <img src="{{ $content['img'] }}">
                        <p>{{ $content['body'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>