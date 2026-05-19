@if (is_plugin_active('blog'))
    <div class="search-popup">
        <button type="button" class="btn-close" aria-label="{{ __('Close') }}">
            <x-core::icon name="ti ti-x" />
        </button>
        <div class="search-content">
            <div class="text-center">
                <h3 class="mb-4 mt-0">{{ __('Press ESC to close') }}</h3>
            </div>
            <form action="{{ route('public.search') }}" data-url="{{ route('public.ajax.posts.search') }}"  class="d-flex search-form blog-posts-search-form" data-bb-toggle="blog-posts-search-form">
                <input autocomplete="off" class="form-control me-2" type="text" name="q" placeholder="{{ __('Search and press enter') }}" aria-label="{{ __('Search') }}">
                <button class="btn btn-default btn-lg" type="submit">
                    <x-core::icon name="ti ti-search" />
                </button>
            </form>

            <div class="blog-posts-search-results">
                <div class="lds-dual-ring"></div>
                <div class="content"></div>
            </div>
        </div>
    </div>
@endif
