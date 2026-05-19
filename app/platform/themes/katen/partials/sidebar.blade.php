@if ($sidebar)
    <div class="col-lg-4">
        <div class="sidebar">
            <div class="inner-wrapper-sticky">
                {!! apply_filters('ads_render', null, 'primary_sidebar_start', ['class' => 'mb-2']) !!}

                {!! $sidebar !!}

                {!! apply_filters('ads_render', null, 'primary_sidebar_end', ['class' => 'mt-2']) !!}
            </div>
        </div>
    </div>
@endif
