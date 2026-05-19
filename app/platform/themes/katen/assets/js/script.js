$(document).ready(function() {
    'use strict'

    window.Theme.isRtl = () => {
        return document.body.dir === 'rtl'
    }

    $(document).on('submit', '.newsletter-form', function (event) {
        event.preventDefault();
        event.stopPropagation();

        let _self = $(this);
        let _button = _self.find('button[type=submit]');
        $.ajax({
            type: 'POST',
            cache: false,
            url: _self.prop('action'),
            data: new FormData(_self[0]),
            contentType: false,
            processData: false,
            beforeSend: () => {
                _button.addClass('disabled button-loading');
            },
            success: res => {
                if (!res.error) {
                    _self.find('input[type=email]').val('');
                    Theme.showSuccess(res.message);
                } else {
                    Theme.showError(res.message);
                }
            },
            error: res => {
                Theme.handleError(res);
            },
            complete: () => {
                if (typeof refreshRecaptcha !== 'undefined') {
                    refreshRecaptcha();
                }
                _button.removeClass('disabled button-loading');
            },
        });
    });
})
