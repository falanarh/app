@php
    $tabs = Shortcode::fields()->getTabsData(['title', 'description', 'icon', 'icon_image', 'url', 'open_in_new_tab'], $shortcode);
@endphp

@if (! empty($tabs))
<div class="row">
    @foreach($tabs as $tab)
        @continue (! ($title = Arr::get($tab, 'title')))

        <div class="col-md-4">
            <div class="contact-item bordered rounded d-flex align-items-center">
                @if ($iconImage = Arr::get($tab, 'icon_image'))
                    <span class="icon d-flex align-items-center justify-content-center">
                        {!! RvMedia::image($iconImage, $title) !!}
                    </span>
                @elseif($icon = Arr::get($tab, 'icon'))
                    <span class="icon d-flex align-items-center justify-content-center">
                        {!! BaseHelper::renderIcon($icon, attributes: ['class' => '']) !!}
                    </span>
                @endif

                <div class="details">
                    <h3 class="mb-0 mt-0">{{ $title }}</h3>

                    @if ($description = BaseHelper::clean(Arr::get($tab, 'description')))
                       <p class="m-0">
                           @if ($url = Arr::get($tab, 'url'))
                               {!! Html::link($url, $description, ['target' => Arr::get($tab, 'open_in_new_tab', 'yes') == 'yes' ? '_blank' : '_self']) !!}
                           @else
                               <span>{!! $description !!}</span>
                           @endif
                       </p>
                    @endif
                </div>
            </div>
            <div class="spacer d-md-none d-lg-none" data-height="30"></div>
        </div>
    @endforeach
</div>

<div class="spacer" data-height="50"></div>
@endif


@if ($title = $shortcode->title)
    <div class="section-header">
        <h3 class="section-title">{!! BaseHelper::clean($title) !!}</h3>
        {!! Theme::partial('title-shape') !!}
    </div>
@endif

{!!
    Str::of($form->renderForm())
        ->replace('contact-button', 'btn btn-primary')
        ->replace('contact-form-group', 'form-group')
        ->replace('contact-form-input', 'form-control')
        ->replace('form-label', 'form-label d-none')
!!}
