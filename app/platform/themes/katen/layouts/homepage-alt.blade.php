@extends(Theme::getThemeNamespace('layouts.base'))

@section('content')
    @if ($homeSidebar = dynamic_sidebar('homepage_sidebar'))
        {!! $homeSidebar !!}
    @endif

    {!! Theme::get('beforeContent') !!}

    <section class="main-content">
        <div class="container-xl">
            <div class="row gy-4 homepage home">
                <div class="col-12">
                    {!! Theme::content() !!}
                </div>
            </div>
        </div>
    </section>

    {!! Theme::get('afterContent') !!}
@endsection

