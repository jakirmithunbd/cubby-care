
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

    /* Portfolio masonary */
    // var m = new Masonry($('.masonry-container').get()[0], {
    //     itemSelector: ".item"
    // });

    /*** Google map */
    // var mapElement = document.getElementById("gmap");
    // if( mapElement) {
    //     var map;
    //     google.maps.event.addDomListener(window, 'load', init);
    // }
    
    // function init() {

    //     var google_map_setting = {
    //         latitude: ajax.gmap_latitude,
    //         longitude: ajax.gmap_longitude
    //     };
        
    //     if (ajax.map_icon) {
    //         var image = ajax.map_icon
    //     }

        
    //     var styles = [
    //         {elementType: 'geometry', stylers: [{color: '#F6F6F6'}]},
    //         {elementType: 'labels.text.stroke', stylers: [{color: '#F6F6F6'}]},
    //         {elementType: 'labels.text.fill', stylers: [{color: '#4D534C'}]},
    //         {
    //           featureType: 'administrative.locality',
    //           elementType: 'labels.text.fill',
    //           stylers: [{color: '#4D534C'}]
    //         },
    //         {
    //           featureType: 'poi',
    //           elementType: 'labels.text.fill',
    //           stylers: [{color: '#4D534C'}]
    //         },
    //         {
    //           featureType: 'poi.park',
    //           elementType: 'geometry',
    //           stylers: [{color: '#E8E8E8'}]
    //         },
    //         {
    //           featureType: 'poi.park',
    //           elementType: 'labels.text.fill',
    //           stylers: [{color: '#E8E8E8'}]
    //         },
    //         {
    //           featureType: 'road',
    //           elementType: 'geometry',
    //           stylers: [{color: '#D7D7D7'}]
    //         },
    //         {
    //           featureType: 'road',
    //           elementType: 'geometry.stroke',
    //           stylers: [{color: '#D7D7D7'}]
    //         },
    //         {
    //           featureType: 'road',
    //           elementType: 'labels.text.fill',
    //           stylers: [{color: '#606060'}]
    //         },
    //         {
    //           featureType: 'road.highway',
    //           elementType: 'geometry',
    //           stylers: [{color: '#D7D7D7'}]
    //         },
    //         {
    //           featureType: 'road.highway',
    //           elementType: 'geometry.stroke',
    //           stylers: [{color: '#D7D7D7'}]
    //         },
    //         {
    //           featureType: 'road.highway',
    //           elementType: 'labels.text.fill',
    //           stylers: [{color: '#CECECE'}]
    //         },
    //         {
    //           featureType: 'transit',
    //           elementType: 'geometry',
    //           stylers: [{color: '#D7D7D7'}]
    //         },
    //         {
    //           featureType: 'transit.station',
    //           elementType: 'labels.text.fill',
    //           stylers: [{color: '#4D534C'}]
    //         },
    //         {
    //           featureType: 'water',
    //           elementType: 'geometry',
    //           stylers: [{color: '#A0A09A'}]
    //         },
    //         {
    //           featureType: 'water',
    //           elementType: 'labels.text.fill',
    //           stylers: [{color: '#5F5F5F'}]
    //         },
    //         {
    //           featureType: 'water',
    //           elementType: 'labels.text.stroke',
    //           stylers: [{color: '#686868'}]
    //         }
    //     ]
        
    //     var mapOptions = {
    //         zoomControl: true,
    //         zoomControlOptions: {
    //             position: google.maps.ControlPosition.RIGHT_TOP
    //         },
    //         disableDefaultUI: true,
    //         draggable: true,
    //         scrollwheel: false,
    //         zoom: parseInt(ajax.map_zoom),
    //         center: new google.maps.LatLng( google_map_setting.latitude, google_map_setting.longitude),
    //         styles: styles,
    //     };

    //     var contentString = ajax.gmap_address;
    //     var infowindow = new google.maps.InfoWindow({
    //         content: contentString,
    //         maxWidth: 200
    //     });

    //     var map = new google.maps.Map(mapElement, mapOptions);

    //     var marker = new google.maps.Marker({
    //         position: new google.maps.LatLng( google_map_setting.latitude, google_map_setting.longitude),
    //         map: map,
    //         icon: image,
    //     });

    //     google.maps.event.addListener(marker, 'click', function() {
    //         infowindow.open(map, marker);
    //     });

    //     var center = map.getCenter();
    //     google.maps.event.addDomListener(window, 'resize', function() {
    //         map.setCenter(center);
    //     });
    // }

})(jQuery);