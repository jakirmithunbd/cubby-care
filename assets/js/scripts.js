
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

        if ($(window).scrollTop() > 0) {
          $(".header").addClass("sticky");
        } 
        else {
          $(".header").removeClass("sticky");
        }

        if ($(window).scrollTop() > 0) {
          $("#sidr-main").addClass("sidr-sticky");
        } 
        else {
          $("#sidr-main").removeClass("sidr-sticky");
        }

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
                slidesToShow: 2
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

        responsive: [
            {
              breakpoint: 768,
              settings: {
                dots: true,
                slidesToShow: 2
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

    // Search icon show
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


    // sticky menu select style
    $('#sticky_tab_select').change(function(e) {
        var value = $(this).val();
        $('a[href="' +'#' + value + '"]').tab('show');
    });

    /*** Enable Masonry */
    var $container = $('.masonry-container');
    if($container.length){
        $container.imagesLoaded( function () {
                $container.masonry({
                    columnWidth: '.item',
                itemSelector: '.item'
                });
            // ensure resize happens with max-width, #803
            var msnry = $container.data('masonry');
            msnry.needsResizeLayout = function() {
              return true;
            };
        });
    }

    //Reinitialize masonry inside each panel after the relative tab link is clicked - 
    $('a[data-toggle=tab]').each(function () {
        var $this = $(this);

        $this.on('shown.bs.tab', function () {
        
            $container.imagesLoaded( function () {
                $container.masonry({
                    columnWidth: '.item',
                    itemSelector: '.item'
                });
            });

        }); //end shown
    });  //end each


    /*** Ajax search load more */
    function searchResultAjax(keywords, page){
        var perpage = $("#search_load_more").data('perpage');
        var found_posts = $(".result-item").data('found_posts');
        var rangeStart = page === 1 ? page : page * perpage - perpage;
        var rangeEnd = page * perpage;
        var range = rangeStart + ' - ' + rangeEnd;

        $.ajax({
            url: ajax.admin_ajax,
            dataType: 'html',
            type: 'POST',
            data: {
                action: 'load_search',
                page: page,
                keywords: keywords,
            },
            beforeSend: function(){
                $('#search_load_more').addClass('loading').text('Loading...');
            },
            success: function(resp){
              if (resp) {
                $('#search-result').append(resp);
                $('#search_load_more').removeClass('loading').text('Load More');
                var hasNoResult = $(resp).hasClass('notResult');
                if(hasNoResult) {
                    $('#search_load_more').hide();
                }
                $('.search-number .pull-right').text("showing " + range + " of " + found_posts + " results");
              }

            },
            error: function( jqXHR, textStatus, errorThrown){
                console.log( jqXHR, textStatus, errorThrown);
            }
        });
    }

    // on page load 
    var page = 1;
    var keywords = $(this).attr('data-keyword');
    searchResultAjax(keywords, page);

    // on load more button click
    $('#search_load_more').on('click', function(e){
        e.preventDefault();
        page++;
        searchResultAjax(keywords, page);
    });

    /*** Ajax post load more */
    function ajaxLoadMore( page = null ){
        $.ajax({
            url: ajax.admin_ajax,
            type: 'POST',
            dataType: 'html',
            data: {
                action: 'load_more_post',
                //query: ajax.query,
                page: page,
            },
            beforeSend: function(resp){
                // $('#ajaxPost').html('<img src="' + ajax.site_url + '/assets/images/svg/preloader.gif">');
                $('#post_load_more').addClass('loading').text('Loading...');
            },
            success: function(resp){
              if (resp) {
                $('#ajaxPost').append(resp);
                $('#post_load_more').removeClass('loading').text('Load More');
              }

              var hasNoResult = $(resp).hasClass('notResult');
              if(hasNoResult) {
                  $('#post_load_more').hide();
              }

            },
            error: function( jqXHR, textStatus, errorThrown){
                console.log( jqXHR, textStatus, errorThrown);
            }
        });
    }

    var page = 1;
    $('#post_load_more').on('click', function(e){
        page++;
        e.preventDefault();
        ajaxLoadMore(page);
    });

    ajaxLoadMore();


    /*** Google map */
    var map, popup, Popup;
    var mapElement = document.getElementById("gmap");
    if( mapElement) {
        var map;
        google.maps.event.addDomListener(window, 'load', init);
    }
    
    function init() {

        definePopupClass();
        
        if (ajax.map_icon) {
            var image = ajax.map_icon
        }

        
        var styles = [
            {elementType: 'geometry', stylers: [{color: '#F6F6F6'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#F6F6F6'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#4D534C'}]},
            {
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#4D534C'}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#4D534C'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#E8E8E8'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#E8E8E8'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#D7D7D7'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#D7D7D7'}]
            },
            {
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#606060'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#D7D7D7'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#D7D7D7'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#CECECE'}]
            },
            {
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{color: '#D7D7D7'}]
            },
            {
              featureType: 'transit.station',
              elementType: 'labels.text.fill',
              stylers: [{color: '#4D534C'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#A0A09A'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#5F5F5F'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#686868'}]
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
            zoom: 12,
            styles: styles,
        };

        console.log( google.maps.ControlPosition );

        var map = new google.maps.Map(mapElement, mapOptions);
        var bounds = new google.maps.LatLngBounds();

        // load multiple markers by looping through the localized data
        var marker, id;

        for (var id in ajax.new_data) {
            if (ajax.new_data.hasOwnProperty(id)) {
                var item = ajax.new_data[id];

                // each marker
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng( item.google_map.lat, item.google_map.lng),
                    map: map,
                    icon: image,
                    title: item.google_map.address
                });

                bounds.extend(marker.position);

                // on click marker event
                google.maps.event.addListener(marker, 'click', (function (marker, id) {
                    return function () {

                        // show location data
                        popup = new Popup(
                            new google.maps.LatLng(item.google_map.lat, item.google_map.lng),
                            document.getElementById('gmap_popup'), id);
                        popup.setMap(map);

                    }
                })(marker, id, map));
            }
        }

        // centre the map with all markers
        map.fitBounds(bounds);

        google.maps.event.addDomListener(window, 'resize', function() {
            map.setCenter(center);
        });

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
      Popup = function(position, content, location_id) {
        this.position = position;

        content.classList.add('popup-bubble-content');

        var location_data = ajax.new_data[location_id];

        var location = `<div class="address-details">
            <h4>${location_data.title}</h4>
            <address>${location_data.centre_address.address}</address>
            <p>p <a class="phone" href="tel:">${location_data.centre_address.phone}</a></p>
            <p>e <a href="mailto:">${location_data.centre_address.email}</a></p>
        </div>

        <div class="opening-hour">
            <h5>Opening hours</h5>
            <div class="social-media">`;

            location_data.opening_hours.social_media.forEach(function(item){
                        location += `<a href="${item.url}"><span class="fa fa-${item.icon}"></a>`;
            });

        location += `</div>
            <p>${location_data.opening_hours.opening_hour}</p>
            <ul class="list-inline">`;

            location +=`<li><a class="btn" href="${location_data.permalink}">Read More</a></li>`;

            location +=`<li><a class="btn" href="${location_data.opening_hours.enquire_button.url}">${location_data.opening_hours.enquire_button.text}</a></li>`;
            
            location +=`</ul>
        </div>`;

        $(content).html(location);

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