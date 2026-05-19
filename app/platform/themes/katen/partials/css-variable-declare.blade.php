<style>
    :root {
        --primary-color: {{ $primaryColor = theme_option('primary_color', '#FE4F70') }} !important;
        --secondary-color: {{ theme_option('secondary_color', '#FFA387') }} !important;
        --text-color: {{ theme_option('text_color', '#8F9BAD') }} !important;
        --gradient-from-color: {{ theme_option('gradient_from', '#FE4F70') }} !important;
        --gradient-to-color: {{ theme_option('gradient_to', '#FFA387') }} !important;
        --gradient-color: linear-gradient(to right, {{ theme_option('gradient_from', '#FE4F70') }}  0%, {{ theme_option('gradient_to', '#FFA387') }} 100%);
        --gradient-color-hover: linear-gradient(to top, {{ theme_option('gradient_from', '#FE4F70') }}  0%, {{ theme_option('gradient_to', '#FFA387') }} 100%);
        --primary-font: '{{ theme_option('primary_font', 'Roboto') }}', sans-serif;
        --heading-font: '{{ theme_option('heading_font', 'Poppins') }}', sans-serif;
    }
</style>
