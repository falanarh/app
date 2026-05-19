@extends(Theme::getThemeNamespace('layouts.base'))

@section('content')
    @if(Theme::get('breadcrumbs', true))
        {!! Theme::partial('breadcrumbs') !!}
    @endif

    @php
        $sidebar = dynamic_sidebar('primary_sidebar');
    @endphp

    {!! Theme::get('beforeContent') !!}

    <section class="main-content">
        <div class="container-xl">
            <div class="row gy-4">
                <div @class(['col-lg-8' => $sidebar, 'col-12' => ! $sidebar])>
                    {!! Theme::content() !!}
                </div>

                {!! Theme::partial('sidebar', compact('sidebar')) !!}
            </div>
        </div>
    </section>

    {!! Theme::get('afterContent') !!}
@endsection

