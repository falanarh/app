$(document).ready(function() {
    "use strict";
    /*=========================================================================
            Preloader
    =========================================================================*/
    $("#preloader").delay(750).fadeOut('slow');

    /*=========================================================================
            Slick sliders
    =========================================================================*/

    const initSlick = () => {
        if ($('.post-carousel-lg').length) {
            $('.post-carousel-lg').slick({
                dots: true,
                arrows: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                rtl: Theme.isRtl(),
                fade: true,
                cssEase: 'linear',
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false,
                    }
                }]
            })
        }

        const $postCarouselFeatured = $('.post-carousel-featured')

        if ($postCarouselFeatured.length) {
            let slidesToShow = $postCarouselFeatured.data('slides-to-show') || 5

            $postCarouselFeatured.slick({
                dots: true,
                arrows: false,
                slidesToShow: slidesToShow,
                slidesToScroll: 2,
                responsive: [
                    {
                        breakpoint: 1440,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                            dots: true,
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            dots: true,
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            dots: true,
                            arrows: false,
                        }
                    }
                    ,
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true,
                            arrows: false,
                        }
                    }
                ]
            })
        }

        if ($('.post-carousel-twoCol').length) {
            $('.post-carousel-twoCol').slick({
                dots: false,
                arrows: false,
                slidesToShow: 2,
                slidesToScroll: 1,
                rtl: Theme.isRtl(),
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false,
                    }
                }
                ]
            })

            // Custom carousel nav
            $(document).on('click', '.carousel-topNav-prev', function() {
                $('.post-carousel-twoCol').slick('slickPrev')
            });
            $(document).on('click', '.carousel-topNav-next', function() {
                $('.post-carousel-twoCol').slick('slickNext')
            });
        }

        if ($('.post-carousel-widget').length && ! $('.post-carousel-widget').hasClass('slick-initialized')) {
            $('.post-carousel-widget').slick({
                dots: false,
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                rtl: Theme.isRtl(),
                responsive: [{
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            })

            // Custom carousel nav
            $(document).on('click', '.carousel-botNav-prev', function() {
                $('.post-carousel-widget').slick('slickPrev')
            });
            $(document).on('click', '.carousel-botNav-next', function() {
                $('.post-carousel-widget').slick('slickNext');
            })
        }


        $('.slick-slider').each(function() {
            const $target = $(this).find('.slick-track')

            if (! $target.attr('aria-label')) {
                $target.attr('aria-label', 'Slick slider')
            }
        })

        $('.slick-dots').each(function() {
            $(this).removeAttr('role')
            const $target = $(this).find('li')
            $target.removeAttr('aria-selected').removeAttr('aria-controls').removeAttr('aria-hidden')

        })
    }

    initSlick()

    /*=========================================================================
            Vertical Menu
    =========================================================================*/
    $(".submenu").before('<i class="icon-arrow-down switch"></i>');

    $(".vertical-menu li i.switch").on('click', function() {
        var $submenu = $(this).next(".submenu");
        $submenu.slideToggle(300);
        $submenu.parent().toggleClass("openmenu");
    });

    /*=========================================================================
            Canvas Menu
    =========================================================================*/
    $(document).on('click', 'button.burger-menu', function() {
        $('.canvas-menu').addClass("open")
        $('.main-overlay').addClass("active")
        $('body').css('overflow', 'hidden')
    })

    $(".canvas-menu .btn-close, .main-overlay").on('click', function() {
        $(".canvas-menu").removeClass("open");
        $(".main-overlay").removeClass("active");
        $('body').css('overflow', 'auto')
    });

    /*=========================================================================
            Popups
    =========================================================================*/
    $("button.search").on('click', function() {
        $(".search-popup").addClass("visible");
        $('body').css('overflow', 'hidden')
    });

    $(document).on('click', '.search-popup .btn-close', function() {
        $(".search-popup").removeClass("visible");
        $('body').css('overflow', 'auto')
    })

    $(document).keyup(function(e) {
        if (e.key === "Escape") { // escape key maps to keycode `27`
            $(".search-popup").removeClass("visible");
            $('body').css('overflow', 'auto')
        }
    });

    /*=========================================================================
            Tabs loader
    =========================================================================*/
    $('button[data-bs-toggle="tab"]').on('click', function() {
        $(".tab-pane").addClass("loading");
        $('.lds-dual-ring').addClass("loading");
        setTimeout(function() {
            $(".tab-pane").removeClass("loading");
            $('.lds-dual-ring').removeClass("loading");
        }, 500);
    });

    /*=========================================================================
            Social share toggle
    =========================================================================*/
    $(document).on('click', 'button.toggle-button', function() {
        $(this).next('.social-share .icons').toggleClass("visible");
        $(this).toggleClass('icon-close').toggleClass('icon-share');
    })

    /*=========================================================================
    Spacer with Data Attribute
    =========================================================================*/
    var list = document.getElementsByClassName('spacer');

    for (var i = 0; i < list.length; i++) {
        var size = list[i].getAttribute('data-height');
        list[i].style.height = "" + size + "px";
    }

    /*=========================================================================
    Background Image with Data Attribute
    =========================================================================*/
    var list = document.getElementsByClassName('data-bg-image');

    for (var i = 0; i < list.length; i++) {
        var bgimage = list[i].getAttribute('data-bg-image');
        list[i].style.backgroundImage = "url('" + bgimage + "')";
    }

    // Theme dark mode
    const $html = $('html')

    $(document).on('click', '[data-bb-toggle="toggle-dark-mode"]', function() {
        const _setCookie = (name, value, days) => {
            let expires = ''
            if (days) {
                const date = new Date()
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000))
                expires = `; expires=${date.toUTCString()}`
            }

            document.cookie = `${name}=${value || ''}${expires}; path=/`
        }

        const $currentTarget = $(this)

        $currentTarget.toggleClass('active')

        if ($currentTarget.hasClass('active')) {
            $html.attr('data-theme', 'dark')
            _setCookie('katen-theme', 'dark', 365)
        } else {
            $html.removeAttr('data-theme')
            _setCookie('katen-theme', 'light', 365)
        }
    })

    if ($html.attr('data-theme') === 'dark') {
        $('.dark-mode-switcher-button').addClass('active')
    }

    // Blog posts ajax

    $('[data-bb-toggle="blog-posts"]').each(function() {
        loadBlogPosts($(this))
    })

    $(document).on('click', '[data-bb-toggle="blog-posts-toggle-type"]', function() {
        loadBlogPosts($(this))
    })

    function loadBlogPosts(element) {
        const $tabContent = $('#posts-tap-content')

        if ($(element).prop('tagName') === 'BUTTON') {
            $('[data-bb-toggle="blog-posts-toggle-type"]').removeClass('active')

            element.addClass('active')
        }

        $.ajax({
            url: element.data('url'),
            method: 'GET',
            dataType: 'json',
            beforeSend: () => {
                $tabContent.find('.lds-dual-ring').addClass('loading')
                $tabContent.find('.tab-pane').addClass('loading')
            },
            success: ({
                          error,
                          data
                      }) => {
                if (error) {
                    return
                }

                $tabContent.find('.blog-posts-content').html(data).show()
            },
            error: (error) => {
                throw error
            },
            complete: () => {
                $tabContent.find('.lds-dual-ring').removeClass('loading')
                $tabContent.find('.tab-pane').removeClass('loading')
            },
        })
    }

    // Blog posts form search ajax

    const $blogSearchForm = $('[data-bb-toggle="blog-posts-search-form"]')
    const $blogSearchResult = $('.blog-posts-search-results')

    function debounce(func, timeout = 300){
        let timer

        return (...args) => {
            clearTimeout(timer)
            timer = setTimeout(() => { func.apply(this, args); }, timeout)
        };
    }

    $blogSearchForm.on('keyup', 'input[name="q"]', debounce(function(event) {
        loadAjaxBlogSearch( $(event.target).val() || null)
    }, 300))

    function loadAjaxBlogSearch (keyword) {
        $.ajax({
            url: $blogSearchForm.data('url'),
            method: 'GET',
            dataType: 'json',
            data: {
                q: keyword
            },
            beforeSend: () => {
                $blogSearchResult.find('.lds-dual-ring').addClass('loading')
                $blogSearchResult.find('.content').addClass('loading')
            },
            success: ({ error, data }) => {
                if (error) {
                    return
                }

                $blogSearchResult.find('.content').html(data)
            },
            error: (error) => {
                throw error
            },
            complete: () => {
                $blogSearchResult.find('.lds-dual-ring').removeClass('loading')
                $blogSearchResult.find('.content').removeClass('loading')
            },
        })
    }

    document.addEventListener('shortcode.loaded', (e) => {
        Theme.lazyLoadInstance.update()

        // Shortcode blog ajax
        const { name, attributes } = e.detail

        if (name === 'blog-posts') {
            if (attributes.style === 'style-5') {
                const $container = $('[data-bb-toggle="shortcode-blog-post-ajax"]')


                if ($container.length) {
                    const $btnLoadMore = $('[data-bb-toggle="load-more-posts"]')

                    $container.each(function() {
                        loadBlogPostsShortcode($(this))
                    })

                    $(document).on('click', '[data-bb-toggle="load-more-posts"]', function(event) {
                        event.preventDefault()

                        loadBlogPostsShortcode($(this))
                    })

                    function loadBlogPostsShortcode(element) {
                        $.ajax({
                            url: element.data('url'),
                            method: 'GET',
                            dataType: 'json',
                            beforeSend: () => {
                                $btnLoadMore.addClass('button-loading disabled')
                            },
                            success: ({ error, data }) => {
                                if (error) {
                                    return
                                }

                                if (! data.nextUrl) {
                                    $btnLoadMore.hide()
                                } else {
                                    $btnLoadMore.data('url', data.nextUrl)
                                }


                                $container.find('.blog-posts-content').append(data.html)
                            },
                            error: (error) => {
                                throw error
                            },
                            complete: () => {
                                $btnLoadMore.removeClass('button-loading disabled')
                            },
                        })
                    }
                }
            }

            if (attributes.style === 'style-4') {
                initSlick()
            }
        }
    })

    /*=========================================================================
           Sticky header
   =========================================================================*/

    var $header = $(".header-default, .header-personal nav, .header-classic .header-bottom"),
        $clone = $header.before($header.clone().addClass("clone"));

    $(window).on("scroll", function() {
        var fromTop = $(window).scrollTop();
        $('body').toggleClass("down", (fromTop > 300));
    });
});
