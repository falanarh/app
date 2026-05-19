@php
    $wrapperClass = $wrapperClass ?? null;
@endphp

<div @class(['header-buttons', $wrapperClass])>
    {!! Theme::partial('language-switcher', ['location' => 'header']) !!}

    {!! Theme::partial('header.account') !!}

    @if (is_plugin_active('blog'))
        <button class="search icon-button" title="{{ __('Search') }}">
            <x-core::icon name="ti ti-search" />
        </button>
    @endif

    <button class="burger-menu icon-button" aria-label="{{ __('Toggle menu') }}">
        <x-core::icon name="ti ti-menu" />
    </button>
</div>
