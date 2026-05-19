@php($timeReading = $post->time_reading)

@if ($timeReading > 0)
    <li class="list-inline-item">
        {{ $timeReading == 1 ? __('1 minute read') : __(':count minutes read', ['count' => $timeReading]) }}
    </li>
@endif
