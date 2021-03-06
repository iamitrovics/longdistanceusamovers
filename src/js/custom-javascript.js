(function ($) {
    jQuery(document).ready(function () {

        //* Counter Js 
        function counterUp() {
            if ($('#about-counter').length) {
                $('.counter').counterUp({
                    delay: 10,
                    time: 400
                });
            };
        };
        counterUp();

        //Homepage Top Slider
        $('#hero-slider').on('init', function (event, slick) {
            $('.animated').addClass('fadeInLeft');
            $('.animated-title').addClass('fadeInUp');
        });
        $('#hero-slider').slick({
            autoplay: true,
            autoplaySpeed: 7000,
            pauseOnHover: false,
            arrows: false,
            dots: false,
            fade: true,
        });
        $('#hero-slider').on('afterChange', function (event, slick, currentSlide) {
            // $('.animated').removeClass('off');
            $('.animated').addClass('fadeInLeft');
            $('.animated-title').addClass('fadeInUp');
        });
        $('#hero-slider').on('beforeChange', function (event, slick, currentSlide) {
            $('.animated').removeClass('fadeInLeft');
            $('.animated-title').removeClass('fadeInUp');
            // $('.animated').addClass('off'); 
        });


        $('#services-header .caption .caption__holder h3 span').on('click', 'a', function () {
            $(this).addClass('active').siblings().removeClass('active');
        });

        // Sticky header
        jQuery(window).scroll(function () {
            if ($(this).scrollTop() > 60) {
                $('#menu_area').addClass("sticky");
            } else {
                $('#menu_area').removeClass("sticky");
            }
        });

        // desktop multilevel menu
        $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
            if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            var $subMenu = $(this).next(".dropdown-menu");
            $subMenu.toggleClass('show');
            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
                $('.dropdown-submenu .show').removeClass("show");
            });
            return false;
        })

    // Menu
    $('#mobile-menu--btn a').click(function(){
        $('.main-menu-sidebar').addClass("menu-active");
        $('.menu-overlay').addClass("active-overlay");
        $(this).toggleClass('open');
    });

    // Menu
    $('.close-menu-btn').click(function(){
        $('.main-menu-sidebar').removeClass("menu-active");
        $('.menu-overlay').removeClass("active-overlay");
    });

        $(function() {
    
        var menu_ul = $('.nav-links > li.has-menu  ul'),
            menu_a  = $('.nav-links > li.has-menu  small');
        
        menu_ul.hide();
        
        menu_a.click(function(e) {
            e.preventDefault();
            if(!$(this).hasClass('active')) {
            menu_a.removeClass('active');
            menu_ul.filter(':visible').slideUp('normal');
            $(this).addClass('active').next().stop(true,true).slideDown('normal');
            } else {
            $(this).removeClass('active');
            $(this).next().stop(true,true).slideUp('normal');
            }
        });
        
        });
        
    $(".nav-links > li.has-menu  small ").attr("href","javascript:;");

    var $menu = $('#menu');

    $(document).mouseup(function (e) {
        if (!$menu.is(e.target) // if the target of the click isn't the container...
        && $menu.has(e.target).length === 0) // ... nor a descendant of the container
        {
        $menu.removeClass('menu-active');
        $('.menu-overlay').removeClass("active-overlay");
        }
    });


        // fancybox video
        $(".about-video .various").fancybox({
            maxWidth: 800,
            maxHeight: 600,
            fitToView: false,
            width: '90%',
            height: '90%',
            autoSize: false,
            closeClick: false,
            openEffect: 'none',
            closeEffect: 'none'
        });

        // scroll to
        $(document).on('click', '#quote-line .ql-in a.quote', function (event) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top - 120
            }, 500);
        });

        // Match height
        $('#blog-listing .guide-box .guide-content h5').matchHeight();
        $('#blog-listing .guide-box').matchHeight();
        $('#services-area #service-boxes .service-box').matchHeight();
        $('#services-area #service-boxes .service-box h3').matchHeight();
        $('#city-guides .guide-box .guide-content h5, #prepare .prepare-box .prepare-content h5').matchHeight();
        $('#city-guides .guide-box .guide-content p').matchHeight();


        // Review slider
        $('.review-slider').slick({
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 8000,
            responsive: [{
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 8000
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 8000
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 8000
                    }
                },
            ]
        });
        $('#guides-slider').slick({
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 8000,
            responsive: [{
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        autoplay: true,
                        dots: false,
                        autoplaySpeed: 8000
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        autoplay: true,
                        dots: false,
                        autoplaySpeed: 8000
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        autoplay: true,
                        dots: false,
                        autoplaySpeed: 8000
                    }
                },
            ]
        });
        $('#prepare-slider').slick({
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 8000,
            responsive: [{
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        autoplay: true,
                        dots: false,
                        autoplaySpeed: 8000
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        autoplay: true,
                        dots: false,
                        autoplaySpeed: 8000
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        autoplay: true,
                        dots: false,
                        autoplaySpeed: 8000
                    }
                },
            ]
        });

        /*jQuery(".faq-accordion").accordion({
            // heightStyle: "content",
            // header: "h4",
            // autoHeight: true,
            // clearStyle: true,
            // active: true,
            // collapsible: true,
            heightStyle: "content",
            autoHeight: true,
            clearStyle: true,
            collapsible: true,
            
        });*/
        $(".faq-accordion .faq-box:first-of-type > h4").addClass('active');
        $(".faq-accordion .faq-box:first-of-type > div").css('display', 'block');
        $(".faq-accordion .faq-box > h4").on("click", function (e) {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                $(this)
                    .siblings(".faq-accordion .faq-box div")
                    .slideUp(200);
            } else {
                $(".faq-accordion .faq-box > h4").removeClass("active");
                $(this).addClass("active");
                $(".faq-accordion .faq-box div").slideUp(200);
                $(this)
                    .siblings(".faq-accordion .faq-box div")
                    .slideDown(200);
            }
            e.preventDefault();
        });

        $('#nav-slider').slick({
            infinite: false,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            autoplay: true,
            infinite: true,
            autoplaySpeed: 4000,
            responsive: [{
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                    }
                },

                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                },

            ]
        });

        $(document).ready(function () {
            $('#open-quote').click(function () {
                $('#quote-full').slideDown(500);
                $('body').toggleClass('body-hidden');
                $('#quote-line').toggleClass('quote-active');

            });
        });

        $(document).ready(function () {
            $('.open-quote').click(function () {
                $('#quote-full').slideDown(500);
                $('body').toggleClass('body-hidden');
                $('#quote-line').toggleClass('quote-active');

            });
        });


        $(document).ready(function () {
            $('#close-quote').click(function () {
                $('#quote-full').hide();
                $('body').toggleClass('body-hidden');
                $('#quote-line').toggleClass('quote-active');

            });
        });

        //    $('.slide-range select').selectpicker();
        // $( function() {
        //  $( ".your-date input" ).datepicker();
        // } );

        $('.selectpicker').selectpicker();
        $(function () {

            var date1 = new Date('05/05/2022');
            var date2 = new Date('05/20/2022');

            var date3 = new Date('06/05/2022');
            var date4 = new Date('06/20/2022');

            var date5 = new Date('07/05/2022');
            var date6 = new Date('07/20/2022');

            $(".date-picker-input").datepicker({
                minDate: '0',
                showOtherMonths: true,
                selectOtherMonths: true,


                beforeShowDay: function (date) {
                    var highlight = date >= date1 && date <= date2
                    var highlight2 = date >= date3 && date <= date4
                    var highlight3 = date >= date5 && date <= date6
                    if (highlight || highlight2 || highlight3) {
                        return [true, "event", 'Tooltip text'];
                    } else {
                        return [true, '', ''];
                    }
                }

            });

        });

        $('.date-picker-input').on('click', function (e) {
            e.preventDefault();
            $(this).attr("autocomplete", "off");
        });

        $(".date-picker-input").attr("autocomplete", "off");

        $(function () {
            $('.quote-cta--single a.btn-cta').click(function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top - 100
                        }, 1000);
                        return false;
                    }
                }
            });
        });

        $(function () {
            $('a.btn-down').click(function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top - 100
                        }, 1000);
                        return false;
                    }
                }
            });
        });

        $(function () {
            $('#featured-article .toc-wrapper ul li a').click(function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top - 100
                        }, 1000);
                        return false;
                    }
                }
            });
        });

        $('.blog__main a').attr("target", "_blank");

        $('.hero-form .nav-tabs').each(function () {
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
            $active.addClass('active');
            $content = $($active.attr('href'));
            $links.not($active).each(function () {
                $($(this).attr('href')).hide();
            });
            $(this).on('click', 'a', function (e) {
                var c = this;
                $active.removeClass('active');
                $content.fadeOut("fast", function () {
                    $active = $(c);
                    $content = $($(c).attr('href'));

                    $active.addClass('active');
                    $content.fadeIn("fast");
                });
                e.preventDefault();
            });
        });


        $('#reviews .nav-tabs').each(function () {
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
            $active.addClass('active');
            $content = $($active.attr('href'));
            $links.not($active).each(function () {
                $($(this).attr('href')).hide();
            });
            $(this).on('click', 'a', function (e) {
                var c = this;
                $active.removeClass('active');
                $content.fadeOut("fast", function () {
                    $active = $(c);
                    $content = $($(c).attr('href'));

                    $active.addClass('active');
                    $content.fadeIn("fast");
                    $('#reviews .review-slider').slick("setPosition", 0);
                });
                e.preventDefault();
            });
        });

        // $('#bottom-form .nav-tabs').each(function () {
        //     var $active, $content, $links = $(this).find('a');
        //     $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
        //     $active.addClass('active');
        //     $content = $($active.attr('href'));
        //     $links.not($active).each(function () {
        //         $($(this).attr('href')).hide();
        //     });
        //     $(this).on('click', 'a', function (e) {
        //         var c = this;
        //         $active.removeClass('active');
        //         $content.fadeOut("fast", function () {
        //             $active = $(c);
        //             $content = $($(c).attr('href'));

        //             $active.addClass('active');
        //             $content.fadeIn("fast");
        //             $('#reviews .review-slider').slick("setPosition", 0);
        //         });
        //         e.preventDefault();
        //     });
        // });

        $('#bottom-form .nav-tabs').each(function () {
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
            $active.addClass('active');
            $content = $($active.attr('href'));
            $links.not($active).each(function () {
                $($(this).attr('href')).hide();
            });
            $(this).on('click', 'a', function (e) {
                var c = this;
                $active.removeClass('active');
                $content.fadeOut("fast", function () {
                    $active = $(c);
                    $content = $($(c).attr('href'));

                    $active.addClass('active');
                    $content.fadeIn("fast");
                });
                e.preventDefault();
            });
        });


    });
})(jQuery);