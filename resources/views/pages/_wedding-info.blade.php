<a name="wedding-info"></a>
<div class="row">
    <div class="main-page-content-block" id="wedding-info">
        <div id="wedding-info-section">
            <div id="wedding-datetime">
                <div class="wedding-date clarendon-headline">Saturday September 10, 2016</div>
                <div class="wedding-location clarendon-subhead">
                    YMCA Camp Abnaki<br />
                    1252 Abnaki Rd<br />
                    North Hero, VT 05474
                </div>
            </div>
            <div id="gmap-embed">
                <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                <div id="gmap_canvas"></div>
                <script type="text/javascript"> function init_map(){var myOptions = {zoom:12,scrollwheel: false,center:new google.maps.LatLng(44.766335,-73.30987499999998),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(44.766335, -73.30987499999998)});infowindow = new google.maps.InfoWindow({content:"<b>YMCA Camp Abnaki</b><br/>1252 Abnaki Rd<br/>05474 North Hero" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
            </div>
            <div id="wedding-info-content">
                @foreach($weddingInfoContent as $key => $content)
                    @if($key % 2 == 0 && $key != 1)
                        <div class="row">
                    @endif
                            <div class="col-lg-6">
                                <img class="content-image img-circle" src="{{ $content['img'] }}">
                                <p class="content-title">{{ $content['title'] }}</p>
                                <div class="content-body">
                                    <p>{{ $content['body'] }}</p>
                                </div>
                            </div>
                    @if($key % 1 == 0 && $key != 0)
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>