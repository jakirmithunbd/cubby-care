
(function($){
  "use strict";

	// Toggle menu
	 $(".navbar-toggle").click(function() {
	  	$(this).toggleClass('in');
	});

     // banner slider
	 $('.banner').slick({
    	arrows: true,
    	infinite: true,
        dots: true,
	  });

	/*** Sticky header */
	$(window).scroll(function() {
		if ($(window).scrollTop() > 30) {
			$(".header").addClass("sticky");
		} 
		else {
			$(".header").removeClass("sticky");
		}
	});

    /*** Header height = gutter height */
    function setGutterHeight(){
        var header = document.querySelector('.header.page-header-all'),
            gutter = document.querySelector('.header_gutter');
            gutter.style.height = header.offsetHeight + 'px';
    }

    window.onload = setGutterHeight;
    window.onresize = setGutterHeight;

    $('.testimonials-slider').slick({
        slidesToShow: 3,
        infinite: true,
        centerMode: true,
        centerPadding: '0px',
        // autoPlay: true,
        dots: true,
        slidesToScroll: 3,
        arrows: false,
          responsive: [
            {
              breakpoint: 768,
              settings: {
                centerMode: false,
                centerPadding: '0px',
                slidesToShow: 2
              }
            },
            {
              breakpoint: 575,
              settings: {
                centerPadding: '0px',
                slidesToShow: 1
              }
            }
          ]
    });

    $('.latest-post-slider').slick({
        slidesToShow: 3,
        infinite: true,
        slidesToScroll: 1,
        arrows: false,
          responsive: [
            {
              breakpoint: 768,
              settings: {
                dots: true,
                slidesToShow: 1
              }
            },
            {
              breakpoint: 575,
              settings: {
                dots: true,
                slidesToShow: 1
              }
            }
          ]
    });

    $('.featured-post').slick({
        slidesToShow: 1,
        infinite: true,
        dots: true,
        arrows: false,
    });

    $('#cubby-related-post').slick({
        slidesToShow: 3,
        infinite: true,
        dots: false,
        arrows: false,
    });

    $('.header').on('click', '.search-toggle', function(e) {
        e.preventDefault();
        var selector = $(this).data('selector');
        $(selector).toggleClass('show').find('.search-input').focus();
        $(this).toggleClass('active');
    });

    $('.openMenu').sidr({
        name: 'sidr-main',
        side: 'right',
        source: '#sidr',
        displace: false,
        renaming: false,
    });

    // mobile search icon
     $("#search-button-mobile").click(function(){
        $("#search-box").toggle('slow');
    });

    // mobile search icon
     $("#close").click(function(){
        $("#search-box").toggle('slow');
    });

     // Gravity Form 
     $(".gfield .ginput_container .gfield_radio").click(function(){
        $(this).addClass("tik");
     });

    /* Ajax post load more */
    var page = 1;
    var data = {
        action: 'load_posts',
        page: page
    }
    function doPostLoadAjax(){
        $.ajax({
            url: ajax.admin_ajax,
            type: 'POST',
            dataType: 'html',
            data: data,
            beforeSend: function(resp){
                // $('#ajaxPost').html('<img src="' + ajax.site_url + '/images/svg/preloader.gif">');
                console.log('ajax Request');
            },
            success: function(resp){
              if (resp) {
                $('#ajaxPost').html(resp);
              }
              console.log('suxxesfgsjkdlf');
            },
            error: function( jqXHR, textStatus, errorThrown){
                console.log( jqXHR, textStatus, errorThrown);
            }
        });
    };

    $('#load_more_posts').on('click', function(){
        data.page++;
        doPostLoadAjax(data);
    });

    // airtasker like sticky tab
    var tab = $('#sticky_tab');
    if(tab.length > 0){
        var tabLocationTop = tab.offset().top - $(window).scrollTop();
        if(tabLocationTop <= 126 ){
          tab.find('.nav-tabs').addClass('sticky');
        } else {
          tab.find('.nav-tabs').removeClass('sticky');
        }
      };
      console.log(tabLocationTop);

    // sticky menu select style
    $('#sticky_tab_select').change(function() {
        var value = $(this).val();
        $('a[href="' + value + '"]').tab('show');
        console.log(value);
    });

    /* Portfolio masonary */
    $('.masonry-container').masonry({
        itemSelector: '.item',
        columnWidth: 200
    });



})(jQuery);