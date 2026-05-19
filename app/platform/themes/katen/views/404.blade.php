@php
    SeoHelper::setTitle($title = __('404 - Not found'));
    Theme::set('pageTitle', $title);
    Theme::fireEventGlobalAssets();
@endphp

@extends(Theme::getThemeNamespace('layouts.base'))

@section('content')
    @if(Theme::get('breadcrumbs', true))
        {!! Theme::partial('breadcrumbs') !!}
    @endif

    <div class="container-xl">
        <div class="row gy-4">
            <div class="col-lg-12">
                <div class="page-content bordered rounded padding-30 mt-4">
                    <div class="error-border"></div>
                    <h4>{{ __('This may have occurred because of several reasons') }}:</h4>
                    <ul>
                        <li>{{ __('The page you requested does not exist.') }}</li>
                        <li>{{ __('The link you clicked is no longer.') }}</li>
                        <li>{{ __('The page may have moved to a new location.') }}</li>
                        <li>{{ __('An error may have occurred.') }}</li>
                        <li>{{ __('You are not authorized to view the requested resource.') }}</li>
                    </ul>
                    <br>
                    <strong>{!! BaseHelper::clean(__('Please try again in a few minutes, or alternatively return to the homepage by <a href=":link">clicking here</a>.', ['link' => route('public.index')])) !!}</strong>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


