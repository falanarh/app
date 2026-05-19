<div class="clearfix"></div>

{!! dynamic_sidebar('top_footer_sidebar') !!}

{!! apply_filters('ads_render', null, 'footer_before', ['class' => 'mb-2']) !!}

<footer>
    <div class="container-xl">
        {!! dynamic_sidebar('mid_footer_sidebar') !!}
        <div class="footer-inner">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-4">
                {!! dynamic_sidebar('bottom_footer_sidebar') !!}
            </div>
        </div>
    </div>
</footer>

{!! apply_filters('ads_render', null, 'footer_after', ['class' => 'mt-2']) !!}
