@if (is_plugin_active('gallery') && $galleries->isNotEmpty())
    @php
        $data = $data ?? null;
    @endphp

    <div class="instagram">
        <div class="container-xl">
            @if (($buttonLabel = Arr::get($data, 'button_label')) && ($buttonUrl = Arr::get($data, 'button_url')))
                <a href="{{ $buttonUrl }}" class="btn btn-default btn-instagram">{!! BaseHelper::clean($buttonLabel) !!}</a>
            @endif
            <div class="instagram-feed d-flex flex-wrap">
                @foreach($galleries as $gallery)
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="{{ $gallery->url }}">
                            {{ RvMedia::image($gallery->image, $gallery->name, 'medium-square', attributes: ['class' => 'w-100']) }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
