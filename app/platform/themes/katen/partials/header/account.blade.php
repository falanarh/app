@if (is_plugin_active('member'))
    @php
        $auth = auth('member');
        $wrapperClass = $wrapperClass ?? null;
    @endphp
    <div @class(['member icon-button', $wrapperClass])>
        @if (! $auth->check())
            <a href="{{ route('public.member.login') }}" title="{{ __('Login') }}" >
                <x-core::icon name="ti ti-user" />
            </a>
        @else
            @php $user = $auth->user(); @endphp

            <a href="{{ route('public.member.dashboard') }}" @class($wrapperClass ?? []) title="{{ $name = $user->name }}">
                <img
                    class="avatar"
                    src="{{ $user->avatar_thumb_url }}"
                    alt="{{ $name }}"
                >
            </a>
        @endif
    </div>
@endif

