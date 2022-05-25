(function ($) {
    jQuery(document).ready(function () {
        // Sticky header
        jQuery(window).scroll(function () {
            if ($(this).scrollTop() > 60) {
                $('#menu_area').addClass("sticky");
            } else {
                $('#menu_area').removeClass("sticky");
            }
        });
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



        $('.select-wrapper input').click(function () {
            $('.select-wrapper input:not(:checked)').next('label').removeClass("checked");
            $('.select-wrapper input:checked').next('label').addClass("checked");
        });
        $('#city-guides .guide-box .guide-content h4, #reviews-page #textual-reviews .review-box h3').matchHeight();
        $('#why-us .why-box h5').matchHeight();
        $('#why-us .why-box .why-text').matchHeight();
        $(".testimonial-video .various , .video-in a").fancybox({
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
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
            ]
        });
        $('#nav-slider').slick({
            infinite: true,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            autoplaySpeed: 8000,
            responsive: [
            {
              breakpoint: 1199,
              settings: {
                  slidesToShow: 4,
                  slidesToScroll: 1,
                }
              },
              {
              breakpoint: 991,
              settings: {
                  slidesToShow: 3,
                  slidesToScroll: 1,
                }
              },
              {
                breakpoint: 767,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                }
              },
            ]
          });
       /* jQuery("#faq-accordion").accordion({
            heightStyle: "content",
            header: "h4",
            autoHeight: false,
            clearStyle: true,
            active: false,
            collapsible: true,
        });
        jQuery(".default-accordion").accordion({
            heightStyle: "content",
            header: "h4",
            autoHeight: false,
            clearStyle: true,
            active: false,
            collapsible: true,
        });*/
        //faq accordion

        $('#cookie-notice').addClass('slide-up');

        $('#close-notice, #accept-cookie').click(function(e) {
            e.preventDefault();
            $("#cookie-notice").removeClass("slide-up");
            $("#cookie-notice").addClass("slide-down");
        });
	
        
        $("#faq-accordion .faq-box > h4").on("click", function(e) {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                $(this)
                .siblings("#faq-accordion .faq-box div")
                .slideUp(200);
            } else {
                $("#faq-accordion .faq-box > h4").removeClass("active");
                $(this).addClass("active");
                $("#faq-accordion .faq-box div").slideUp(200);
                $(this)
                .siblings("#faq-accordion .faq-box div")
                .slideDown(200);
            }
            e.preventDefault();
        });

        $(".default-accordion .faq-box > h4").on("click", function(e) {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                $(this)
                .siblings(".default-accordion .faq-box div")
                .slideUp(200);
            } else {
                $(".default-accordion .faq-box > h4").removeClass("active");
                $(this).addClass("active");
                $(".default-accordion .faq-box div").slideUp(200);
                $(this)
                .siblings(".default-accordion .faq-box div")
                .slideDown(200);
            }
            e.preventDefault();
        });

        jQuery(document).ready(function ($) {
            var $timeline_block = $('.cd-timeline-block');
            //hide timeline blocks which are outside the viewport
            $timeline_block.each(function () {
                if ($(this).offset().top > $(window).scrollTop() + $(window).height() * 0.75) {
                    $(this).find('.cd-timeline-num, .cd-timeline-content').addClass('is-hidden');
                }
            });
            $(function () {
                var date1 = new Date('05/05/2021');
                var date2 = new Date('05/20/2021');
                var date3 = new Date('06/05/2021');
                var date4 = new Date('06/20/2021');
                var date5 = new Date('07/05/2021');
                var date6 = new Date('07/20/2021');
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
            $('.main__content a').attr("target", "_blank");
            $('.date-picker-input').on('click', function (e) {
                e.preventDefault();
                $(this).attr("autocomplete", "off");
            });
            $(".date-picker-input").attr("autocomplete", "off");
            //on scolling, show/animate timeline blocks when enter the viewport
            $(window).on('scroll', function () {
                $timeline_block.each(function () {
                    if ($(this).offset().top <= $(window).scrollTop() + $(window).height() * 0.75 && $(this).find('.cd-timeline-num').hasClass('is-hidden')) {
                        $(this).find('.cd-timeline-num, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
                    }
                });
            });
            $('#booking-form .nav-tabs, #booking-div .nav-tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active.attr('href'));
                $links.not($active).each(function () {
                    $($(this).attr('href')).hide();
                });
                $(this).on('click', 'a', function(e){
                var c = this;
                    $active.removeClass('active');
                    $content.fadeOut("fast", function(){
                        $active = $(c);
                        $content = $($(c).attr('href'));
                        
                        $active.addClass('active');
                        $content.fadeIn("fast");
                    });
                    e.preventDefault();
                });
            });
             //modal
            setTimeout(function () {
                jQuery('.modal-overlay').addClass('show');
            }, 1000);
            $('.zebra_tooltips_below').click(function (e) {
                var myEm = $(this).attr('data-my-element');
                var modal = $('.modal-overlay[data-my-element = ' + myEm + '], .modal[data-my-element = ' + myEm + ']');
                e.preventDefault();
                modal.addClass('active');
                $('html').addClass('fixed');
            });
            $('.close-modal').click(function () {
                var modal = $('.modal-overlay, .modal');
                $('html').removeClass('fixed');
                modal.removeClass('active');
            });
        });
    });
})(jQuery);