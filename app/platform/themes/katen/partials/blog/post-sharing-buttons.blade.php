@if($socials)
    <ul @class(['icons social-icons list-unstyled list-inline mb-0', $wrapperClass ?? null])>
        @foreach($socials as $social)
            @php
                $name = Arr::get($social, 'name');
                $backgroundColor = Arr::get($social, 'background_color');
                $color = Arr::get($social, 'color');
            @endphp

            <li class="list-inline-item">
                <a
                    aria-label="{{ __('Share on :social', ['social' => $name]) }}"
                    @style(["background-color: {$backgroundColor}" => $backgroundColor, "color: {$color}" => $color])
                    href="{{ Arr::get($social, 'url') }}"
                >
                    {!! Arr::get($social, 'icon') !!}
                </a>
            </li>
        @endforeach
    </ul>
@endif
