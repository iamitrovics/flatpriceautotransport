//@prepros-prepend modernizr.js
//@prepros-prepend jquery.min.js
//@prepros-prepend bootstrap4\bootstrap.bundle.js
//@prepros-prepend easing.js
//@prepros-prepend skip-link-focus-fix.js
//@prepros-prepend slick.js
//@prepros-prepend jquery.matchHeight.js
//@prepros-prepend moment\moment-with-locales.min.js
//@prepros-prepend jquery.fancybox.min.js
//@prepros-prepend _main.js
//@prepros-prepend bootstrap-select.js//
//@prepros-prepend jquery-ui.min.js
//@prepros-prepend wow.min.js
//@prepros-prepend sliding-menu.js





(function($) {
	jQuery(document).ready(function() {
		// Sticky header
		jQuery(window).scroll(function() {
		  if ($(this).scrollTop() > 60){  
		      $('#menu_area').addClass("sticky");
		    }
		    else{
		      $('#menu_area').removeClass("sticky");
		    }
		});

		$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
	      	if (!$(this).next().hasClass('show')) {
	        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
	      }
	      var $subMenu = $(this).next(".dropdown-menu");
	      $subMenu.toggleClass('show');

	      $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
	        $('.dropdown-submenu .show').removeClass("show");
	      });

	      return false;
	    })

        $("#menu").slidingMenu();

	 	jQuery("#mobile-menu--btn").click(function(){
	    	jQuery(".menu-overlay").addClass("active-overlay");
            jQuery("html,body").addClass("fixed");
            jQuery('.main-menu-sidebar').addClass("menu-active");
	    });
	   
	    jQuery('.main-menu-sidebar .close-menu-btn, .menu-overlay').click(function(){
	        jQuery('.main-menu-sidebar').removeClass("menu-active");
	        jQuery(".menu-overlay").removeClass("active-overlay");
	    });

        $('.select-wrapper input').click(function () {
	        $('.select-wrapper input:not(:checked)').next('label').removeClass("checked");
	        $('.select-wrapper input:checked').next('label').addClass("checked");
	    });

        $('#city-guides .guide-box .guide-content h4, #reviews-page #textual-reviews .review-box h3').matchHeight();
        $('#why-us .why-box h5').matchHeight();
        $('#why-us .why-box .why-text').matchHeight();
        
        $(".testimonial-video .various").fancybox({
		    maxWidth  : 800,
		    maxHeight : 600,
		    fitToView : false,
		    width   : '90%',
		    height    : '90%',
		    autoSize  : false,
		    closeClick  : false,
		    openEffect  : 'none',
		    closeEffect : 'none'
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
		  responsive: [
		  {
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
		jQuery("#faq-accordion").accordion({
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
		});

		jQuery(document).ready(function($){
		    var $timeline_block = $('.cd-timeline-block');

		    //hide timeline blocks which are outside the viewport
		    $timeline_block.each(function(){
		        if($(this).offset().top > $(window).scrollTop()+$(window).height()*0.75) {
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
                    
                    
                    beforeShowDay: function( date ) {
                        var highlight = date >= date1 && date <= date2
                        var highlight2 = date >= date3 && date <= date4
                        var highlight3 = date >= date5 && date <= date6
                        if( highlight || highlight2 || highlight3 ) {
                             return [true, "event", 'Tooltip text'];
                        } else {
                             return [true, '', ''];
                        }
                    }
            
                });

        });

		$('.main__content a').attr("target","_blank");

        $('.date-picker-input').on('click', function(e) {
          e.preventDefault();
          $(this).attr("autocomplete", "off");  
       });

       $(".date-picker-input").attr("autocomplete", "off");

		    //on scolling, show/animate timeline blocks when enter the viewport
		    $(window).on('scroll', function(){
		        $timeline_block.each(function(){
		            if( $(this).offset().top <= $(window).scrollTop()+$(window).height()*0.75 && $(this).find('.cd-timeline-num').hasClass('is-hidden') ) {
		                $(this).find('.cd-timeline-num, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
		            }
		        });
		    });
		});
	});
})(jQuery);
