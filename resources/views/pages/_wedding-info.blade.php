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
            <div id="gmap-embed">
                <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                <div id="gmap_canvas"></div>
                <script type="text/javascript"> function init_map(){var myOptions = {zoom:12,scrollwheel: false,center:new google.maps.LatLng(44.766335,-73.30987499999998),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(44.766335, -73.30987499999998)});infowindow = new google.maps.InfoWindow({content:"<b>YMCA Camp Abnaki</b><br/>1252 Abnaki Rd<br/>05474 North Hero" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
            </div>
        </div>
    </div>
</div>