@if (! empty($ad))
    <div class="widget no-container rounded text-md-center">
        @if($title = Arr::get($config, 'title'))
            <span class="d-block awesome-things-title mb-2">{!! BaseHelper::clean($title) !!}</span>
        @endif

        @if ($ad->ads_type === 'google_adsense' && $ad->google_adsense_slot_id)
            <div {!! Html::attributes($attributes) !!}>
                @include('plugins/ads::partials.google-adsense.unit-ads-slot', ['slotId' => $ad->google_adsense_slot_id])
            </div>
        @elseif ($ad->url)
            <a href="{{ $ad->click_url }}" @if($ad->open_in_new_tab) class="widget-awesome-things" target="_blank" @endif>
                @endif
                <picture>
                    <source
                        srcset="{{ $ad->image_url }}"
                        media="(min-width: 1200px)"
                    />
                    <source
                        srcset="{{ $ad->tablet_image_url }}"
                        media="(min-width: 768px)"
                    />
                    <source
                        srcset="{{ $ad->mobile_image_url }}"
                        media="(max-width: 767px)"
                    />

                    {{ RvMedia::image($ad->image_url, $ad->name, attributes: ['style' => 'width: 100%']) }}
                </picture>
                @if($ad->url)
            </a>
        @endif
    </div>
@endif
