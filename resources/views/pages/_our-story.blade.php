<div id="our-story">
        <div id="our-story-section">
            <div id="desktop-story">
                <div class="col-md-4 col-md-offset-1"></div>
                <div class="col-md-7" class="our-story-text">
                    <div class="container-fluid">
                    @for($i=0, $j=5; $i < 5; $i++, $j++)
                        <div class="row our-story-row">
                            <div class="col-md-6 our-story-block">
                                <p class="date highway-subhead">{!! $ourStoryContent[$i]['date'] !!}</p>
                                <p class="event clarendon-subhead">{!! $ourStoryContent[$i]['event'] !!}</p>
                                <p class="location">{!! $ourStoryContent[$i]['location'] !!}</p>
                            </div>
                            <div class="col-md-6 our-story-block">
                                <p class="date highway-subhead">{!! $ourStoryContent[$j]['date'] !!}</p>
                                <p class="event clarendon-subhead">{!! $ourStoryContent[$j]['event'] !!}</p>
                                <p class="location">{!! $ourStoryContent[$j]['location'] !!}</p>
                            </div>
                        </div>
                    @endfor
                    </div>
                </div>
            </div>
            <div id="mobile-story">
                <div class="container-fluid">
                    <div class="our-story-text">
                    @foreach($ourStoryContent as $storyBlock)
                        <div class='row our-story-block'>
                            <p class="date highway-subhead">{!! $storyBlock['date'] !!}</p>
                            <p class="event clarendon-subhead">{!! $storyBlock['event'] !!}</p>
                            <p class="location">{!! $storyBlock['location'] !!}</p>
                        </div>
                    @endforeach
                    </div>
                    <div id="header-img">
                        <img id="header-img" src="/img/Lakehouse-hires.jpg" />
                    </div>
                </div>
            </div>
        </div>
    </div>
