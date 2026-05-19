@extends(Theme::getThemeNamespace('layouts.base'))

@section('content')
    @if(Theme::get('breadcrumbs', true))
        {!! Theme::partial('breadcrumbs') !!}
    @endif

    {!! Theme::get('beforeContent') !!}

    <section class="main-content">
        <div class="container-xl">
            {!! Theme::content() !!}
        </div>
    </section>

    {!! Theme::get('afterContent') !!}
@endsection

