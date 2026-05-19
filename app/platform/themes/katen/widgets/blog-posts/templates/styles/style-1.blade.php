@if (is_plugin_active('blog') && $categoryIds)
    <section class="mb-4 widget-blog-posts post-tabs rounded bordered" data-bb-toggle="blog-posts" data-url="{{
        route('public.ajax.posts', [
            'categories' => $categoryIds,
            'type' => Arr::first($types),
            'limit' => $limit,
            'template' => 'widgets.blog-posts.templates.partials.posts',
        ])
    }}"
    >
        <div class="blog-posts-ajax">
            @if ($title = Arr::get($config, 'title'))
                <div class="widget-header text-center">
                    <h3 class="widget-title mt-0">{!! BaseHelper::clean($title) !!}</h3>
                    {!! Theme::partial('title-shape') !!}
                </div>
            @endif

            @if ($types && count($types) > 1)
                <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
                    @foreach($types as $type)
                        <li class="nav-item mb-2" role="presentation">
                            <button
                                @class(['nav-link', 'active' => $loop->first])
                                data-bb-toggle="blog-posts-toggle-type"
                                data-url="{{
                                    route('public.ajax.posts', [
                                        'categories' => $categoryIds,
                                        'type' => $type,
                                        'limit' => $limit,
                                        'template' => 'widgets.blog-posts.templates.partials.posts',
                                    ])
                                }}"
                                role="tab"
                                type="button"
                            >
                                @switch($type)
                                    @case('recent')
                                        {{ __('Recent') }}
                                        @break
                                    @case('popular')
                                        {{ __('Popular') }}
                                        @break
                                    @case('featured')
                                        {{ __('Featured') }}
                                        @break
                                    @default
                                        {{ ucfirst($type) }}
                                @endswitch
                            </button>
                        </li>
                    @endforeach
                </ul>
            @endif

            <div @style(["margin-top: unset !important;" => ! ($types && count($types) > 1)]) class="tab-content" id="posts-tap-content">
                <div class="lds-dual-ring"></div>
                <div aria-labelledby="recent-tab" class="tab-pane fade show active" role="tabpanel">
                    <div class="blog-posts-content" style="display: none"></div>
                </div>
            </div>
        </div>
    </section>
@endif
