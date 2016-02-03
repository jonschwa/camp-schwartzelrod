<div class="main-page-content-block" id="vt-info">
    <div id="vt-info-section">
        <div id="gmap-embed">
            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
            <div id="gmap_canvas"></div>
            <script type="text/javascript"> function init_map(){var myOptions = {zoom:12,scrollwheel: false,center:new google.maps.LatLng(44.766335,-73.30987499999998),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(44.766335, -73.30987499999998)});infowindow = new google.maps.InfoWindow({content:"<b>YMCA Camp Abnaki</b><br/>1252 Abnaki Rd<br/>05474 North Hero" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
        </div>
        <a name="vt-info"></a>
        <div class="container-fluid info">
            <div class="col-md-6">
                <div class="content-block">
                    {{--<img class="content-image img-circle" src="https://placehold.it/200x200">--}}
                    <p class="clarendon-headline green">Camp Abnaki</p>
                    <p class="highway-subhead">(a.k.a. Camp Schwartzelrod)</p>
                    <div class="content-body">
                        <p class="grey">Now in its 115th year, Camp Abnaki hosts 750 campers and 70 staff each summer. The 90-acre property features a modern dining hall, four cabin villages, an expansive waterfront, hiking trails, sports fields, skate park, archery range, low ropes course, historic camp buildings, and multiple scenic fire circles.</p>
                        <p class="grey">We will have exclusive use of the entire camp property for the whole weekend!</p>
                        <p>
                            <a class="highway-subhead" href="http://www.campabnaki.org/map_of_camp.shtml" target="_blank">Camp Map</a><br />
                            <a class="highway-subhead" href="http://newspin360.com/tour/vt/northhero/campabnaki/" target="_blank">Virtual Tour</a><br />
                            <a class="highway-subhead" href="http://www.campabnaki.org/directions.shtml" target="_blank">Driving Directions</a><br />
                            <a class="highway-subhead" href="http://www.campabnaki.org/camp_history.shtml" target="_blank">Camp History</a><br />
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-block">
                    {{--<img class="content-image img-circle" src="https://placehold.it/200x200">--}}
                    <p class="clarendon-headline green">North Hero Island</p>
                    <p class="highway-subhead">(a.k.a. Almost Canada)</p>
                    <div class="content-body">
                        <p class="grey">Camp Abnaki is located in North Hero, VT, one of four towns which make up the Lake Champlain Islands. It is easily accessible by car</p>
                        <div id="distance-to-camp">
                            <p>
                                <span class="highway-subhead">Burlington International Airport</span><span class="grey"> 45 minutes</span><br />
                                <span class="highway-subhead">Plattsburgh International Airport</span><span class="grey"> 1 hour, 15 minutes</span><br />
                                <span class="highway-subhead">Burlington, VT</span><span class="grey"> 45 minutes</span><br />
                                <span class="highway-subhead">Plattsburgh, NY</span><span class="grey"> 1 hour (or <a href=”http://www.ferries.com/crossing-schedule-rates/grand-isle-to-plattsburgh-ferry” target=”_blank”>take the ferry</a>!)</span><br />
                                <span class="highway-subhead">Boston, MA</span><span class="grey"> 4 hours</span><br />
                                <span class="highway-subhead">Ithaca, NY</span><span class="grey"> 6 hours</span><br />
                                <span class="highway-subhead">New York, NY</span><span class="grey"> 6 hours</span><br />
                                <span class="highway-subhead">Washington, DC</span><span class="grey"> 9.5 hours</span><br />
                                <span class="highway-subhead">Montreal, Canada</span><span class="grey"> 1.5 hours</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
