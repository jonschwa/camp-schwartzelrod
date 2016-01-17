<div class="container-fluid inline-option-header">
    @if($column == 'left')
        <div class="col-md-10">
            <p class="clarendon-subhead {{ $column }}-text subtitle">{{ $section_title }}</p>
            <div class="subtitle {{ $column }}-text">
                {!! $subtitle !!}
            </div>
        </div>
        <div class="col-md-2 {{ $column }}-img">
            <object class="option-image img-circle" data="{!! $icon_url !!}" type="image/svg+xml">
                {{--<img option-image img-circle src="{!! $icon_url !!}" />--}}
            </object>
        </div>
    @elseif($column == 'right')
        <div class="col-md-3  {{ $column }}-img">
            <img class="option-image img-circle" src="{!! $icon_url !!}" />
        </div>
        <div class="col-md-9">
            <p class="clarendon-subhead {{ $column }}-text subtitle">{{ $section_title }}</p>
            <div class="subtitle {{ $column }}-text">
                {!! $subtitle !!}
            </div>
        </div>
    @endif
</div>
<p class="option-detail">
    {!! $option_detail !!}
</p>