@if (is_plugin_active('language'))
    @php
        $supportedLocales = Language::getSupportedLocales();

        if (empty($options)) {
            $options = [
                'before' => '',
                'lang_flag' => true,
                'lang_name' => true,
                'class' => '',
                'after' => '',
            ];
        }

        $location = $location ?? 'header';
    @endphp

    @if ($supportedLocales && count($supportedLocales) > 1)
        @php
            $languageDisplay = setting('language_display', 'all');
            $showRelated = setting('language_show_default_item_if_current_version_not_existed', true);
        @endphp

        @switch($location)
            @case('header')
                <div @class(['language-switcher-button d-none', $wrapperClass ?? 'd-md-inline-block me-2'])>
                    <div class="d-lg-block d-none dropdown d-inline-flex align-items-center">
                        <a class="dropdown-toggle" type="button" id="language-switcher-dropdown-{{ $location }}" data-bs-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (Arr::get($options, 'lang_flag', true) && ($languageDisplay == 'all' || $languageDisplay == 'flag'))
                                {!! language_flag(Language::getCurrentLocaleFlag()) !!}
                            @endif

                            @if (Arr::get($options, 'lang_name', true) && ($languageDisplay == 'all' || $languageDisplay == 'name'))
                                &nbsp;<span>{{ Language::getCurrentLocaleName() }}</span>
                            @endif
                        </a>

                        <div aria-labelledby="language-switcher-dropdown-{{ $location }}" class="dropdown-menu mt-2">
                            @foreach ($supportedLocales as $localeCode => $properties)
                                @if ($localeCode != Language::getCurrentLocale())
                                    <li>
                                        <a class="dropdown-item" href="{{ $showRelated ? Language::getLocalizedURL($localeCode) : url($localeCode) }}" target="_self">
                                            @if (Arr::get($options, 'lang_flag', true) && ($languageDisplay == 'all' || $languageDisplay == 'flag'))
                                                {!! language_flag($properties['lang_flag']) !!} <span class="ms-2">{{ $properties['lang_name'] }}</span>
                                            @endif
                                            @if (Arr::get($options, 'lang_name', true) &&  ($languageDisplay == 'name'))
                                                &nbsp;{{ $properties['lang_name'] }}
                                            @endif
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @break

            @case('sidebar')
                <nav class="language-switcher mt-4 mb-4">
                    <div class="mt-2">
                        <strong>{{ __('Language') }}</strong>
                    </div>

                    <ul class="vertical-menu mt-2">
                        @foreach ($supportedLocales as $localeCode => $properties)
                            @if ($localeCode != Language::getCurrentLocale())
                                <li >
                                    <a href="{{ $showRelated ? Language::getLocalizedURL($localeCode) : url($localeCode) }}" target="_self">
                                        @if (Arr::get($options, 'lang_flag', true) && ($languageDisplay == 'all' || $languageDisplay == 'flag'))
                                            {!! language_flag($properties['lang_flag']) !!} <span class="ms-3">{{ $properties['lang_name'] }}</span>
                                        @endif

                                        @if (Arr::get($options, 'lang_name', true) &&  ($languageDisplay == 'name'))
                                            &nbsp;{{ $properties['lang_name'] }}
                                        @endif
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
                @break
        @endswitch
    @endif
@endif
