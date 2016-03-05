<div class="container-fluid inline-option-header">
    @if($column == 'left')
        <div class="col-md-2 col-md-push-10 {{ $column }}-img">
            <object class="option-image img-circle" data="{!! $icon_url !!}" type="image/svg+xml">
                {{--<img option-image img-circle src="{!! $icon_url !!}" />--}}
            </object>
        </div>
        <div class="col-md-10 col-md-pull-2 lodging-option-text-container-left">
            <p class="clarendon-subhead {{ $column }}-text subtitle">{{ $section_title }}</p>
            <div class="subtitle {{ $column }}-text">
                {!! $subtitle !!}
            </div>
        </div>
    @elseif($column == 'right')
        <div class="col-md-3 col-lg-2 {{ $column }}-img">
            <img class="option-image img-circle" src="{!! $icon_url !!}" />
        </div>
        <div class="col-md-8 col-lg-8">
            <p class="clarendon-subhead {{ $column }}-text subtitle lodging-option-text-container-right">{{ $section_title }}</p>
            <div class="subtitle {{ $column }}-text">
                {!! $subtitle !!}
            </div>
        </div>
    @endif
</div>
<p class="option-detail">
    {!! $option_detail !!}
</p>