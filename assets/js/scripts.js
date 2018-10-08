
(function($){
  "use strict";

 

	// Toggle menu
	 $(".navbar-toggle").click(function() {
	  	$(this).toggleClass('in');
	});

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

    /* Portfolio masonary */
    var m = new Masonry($('.masonry-container').get()[0], {
        itemSelector: ".item"
    });

    $('#container').masonry({
        itemSelector: '.item',
        columnWidth: 70
    });

    // google map
    var map, popup, Popup;
    var mapElement = document.getElementById("gmap");

    if( mapElement) {
        var map;
        google.maps.event.addDomListener(window, 'load', init);
    }
    
    function init() {

        definePopupClass();

        var google_map_setting = {
            latitude: ajax.gmap_latitude,
            longitude: ajax.gmap_longitude
        };
        
        if (ajax.map_icon) {
            var image = ajax.map_icon
        }

        
        var styles = [
            {elementType: 'geometry', stylers: [{color: '#F2F2F2'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#F2F2F2'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#F2F2F2'}]},
            {
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#485056'}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#FF9F67'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#F2F2F2'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#4C97F2'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#F2F2F2'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#F2F2F2'}]
            },
            {
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#F2F2F2'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#FFF2AF'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#F6D273'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#4B7CB8'}]
            },
            {
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{color: '#F2F2F2'}]
            },
            {
              featureType: 'transit.station',
              elementType: 'labels.text.fill',
              stylers: [{color: '#FF9F67'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#F2F2F2'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#FF9F67'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#F2F2F2'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry.fill',
              stylers: [{color: '#F2F2F2'}]
            },
            {
              featureType: 'transit.line',
              elementType: 'labels.text.fill',
              stylers: [{color: '#F2F2F2'}]
            }
        ]
        
        var mapOptions = {
            zoomControl: true,
            zoomControlOptions: {
                position: google.maps.ControlPosition.RIGHT_TOP
            },
            disableDefaultUI: true,
            draggable: true,
            scrollwheel: false,
            zoom: parseInt(ajax.map_zoom),
            center: new google.maps.LatLng( google_map_setting.latitude, google_map_setting.longitude),
            styles: styles,
        };

        var contentString = ajax.gmap_address;
        var infowindow = new google.maps.InfoWindow({
            content: contentString,
            maxWidth: 200
        });

        map = new google.maps.Map(mapElement, mapOptions);

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng( google_map_setting.latitude, google_map_setting.longitude),
            map: map,
            icon: image,
        });

        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
        });

        var center = map.getCenter();
        google.maps.event.addDomListener(window, 'resize', function() {
            map.setCenter(center);
        });

        popup = new Popup(
            new google.maps.LatLng(google_map_setting.latitude, google_map_setting.longitude),
            document.getElementById('gmap_popup'));
        popup.setMap(map);
    }



    /** Defines the Popup class. */
    function definePopupClass() {
      /**
       * A customized popup on the map.
       * @param {!google.maps.LatLng} position
       * @param {!Element} content
       * @constructor
       * @extends {google.maps.OverlayView}
       */
      Popup = function(position, content) {
        this.position = position;

        content.classList.add('popup-bubble-content');

        var pixelOffset = document.createElement('div');
        pixelOffset.classList.add('popup-bubble-anchor');
        pixelOffset.appendChild(content);

        this.anchor = document.createElement('div');
        this.anchor.classList.add('popup-tip-anchor');
        this.anchor.appendChild(pixelOffset);

        // Optionally stop clicks, etc., from bubbling up to the map.
        this.stopEventPropagation();
      };
      // NOTE: google.maps.OverlayView is only defined once the Maps API has
      // loaded. That is why Popup is defined inside initMap().
      Popup.prototype = Object.create(google.maps.OverlayView.prototype);

      /** Called when the popup is added to the map. */
      Popup.prototype.onAdd = function() {
        this.getPanes().floatPane.appendChild(this.anchor);
      };

      /** Called when the popup is removed from the map. */
      Popup.prototype.onRemove = function() {
        if (this.anchor.parentElement) {
          this.anchor.parentElement.removeChild(this.anchor);
        }
      };

      /** Called when the popup needs to draw itself. */
      Popup.prototype.draw = function() {
        var divPosition = this.getProjection().fromLatLngToDivPixel(this.position);
        // Hide the popup when it is far out of view.
        var display =
            Math.abs(divPosition.x) < 4000 && Math.abs(divPosition.y) < 4000 ?
            'block' :
            'none';

        if (display === 'block') {
          this.anchor.style.left = divPosition.x + 'px';
          this.anchor.style.top = divPosition.y + 'px';
        }
        if (this.anchor.style.display !== display) {
          this.anchor.style.display = display;
        }
      };

      /** Stops clicks/drags from bubbling up to the map. */
      Popup.prototype.stopEventPropagation = function() {
        var anchor = this.anchor;
        anchor.style.cursor = 'auto';

        ['click', 'dblclick', 'contextmenu', 'wheel', 'mousedown', 'touchstart',
         'pointerdown']
            .forEach(function(event) {
              anchor.addEventListener(event, function(e) {
                e.stopPropagation();
              });
            });
      };
    }



})(jQuery);