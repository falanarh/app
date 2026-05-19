@extends(Theme::getThemeNamespace('layouts.base'))

@section('content')
    @php
        $sidebar = dynamic_sidebar('primary_sidebar');
    @endphp

    @if ($homeSidebar = dynamic_sidebar('homepage_sidebar'))
        {!! $homeSidebar !!}
    @endif

    {!! Theme::get('beforeContent') !!}

    <section class="homepage main-content">
        <div class="container-xl">
            <div class="row gy-4 homepage home">
                <div @class(['col-lg-8' => $sidebar, 'col-12' => ! $sidebar])>
                    {!! Theme::content() !!}
                </div>

                {!! Theme::partial('sidebar', compact('sidebar')) !!}
            </div>
        </div>
    </section>

    {!! Theme::get('afterContent') !!}
@endsection

