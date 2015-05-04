jQuery( document ).ready(function( $ ) {


    // Slick Slider - Home Page
    $('.sliderHome').slick({
        autoplay: true,
        autoplaySpeed: 1200,
        infinite: true,
        dots: true,
        slidesToShow: 1,
        touchMove: true,
        slidesToScroll: 1,
        element: 'div',
        responsive: [
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: false
                }
            }
        ]
    });
    

    // Instagram Feed
    $(function() {
     
        //Set up instafeed
        var feed = new Instafeed({
            clientId: '352454a1ac684720b99ed553eebfab1e',
            target: 'instafeed',
            get: 'user',
            userId: 1149802252,
            accessToken: '1149802252.9078622.39d85b0f0315426f852196e5f0ce5201',
            links: true,
            limit: 12,
            sortBy: 'most-recent',
            resolution: 'standard_resolution',
            template: '<div class="instagramFeed"><a href="{{link}}" target="_blank"><img src="{{image}}"></a></div>'
        });
        feed.run();
    });

    // Removes all the random &npsp's in the home page recent posts list
    $(".small-block-grid-1").each(function() {
        var $this = $(this);
        $this.html($this.html().replace(/&nbsp;/g, ''));
    });

    /*
    *  render_map
    *
    *  This function will render a Google Map onto the selected jQuery element
    *
    *  @type    function
    *  @date    8/11/2013
    *  @since   4.3.0
    *
    *  @param   $el (jQuery element)
    *  @return  n/a
    */

    function render_map( $el ) {

        // var
        var $markers = $el.find('.marker');

        // vars
        var args = {
            zoom        : 16,
            center      : new google.maps.LatLng(0, 0),
            mapTypeId   : google.maps.MapTypeId.ROADMAP
        };

        // create map               
        var map = new google.maps.Map( $el[0], args);

        // add a markers reference
        map.markers = [];

        // add markers
        $markers.each(function(){

            add_marker( $(this), map );

        });

        // center map
        center_map( map );

    }

    /*
    *  add_marker
    *  This function will add a marker to the selected Google Map
    */

    function add_marker( $marker, map ) {

        // var
        var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

        // create marker
        var marker = new google.maps.Marker({
            position    : latlng,
            map         : map
        });

        // add to array
        map.markers.push( marker );

        // if marker contains HTML, add it to an infoWindow
        if( $marker.html() )
        {
            // create info window
            var infowindow = new google.maps.InfoWindow({
                content     : $marker.html()
            });

            // show info window when marker is clicked
            google.maps.event.addListener(marker, 'click', function() {

                infowindow.open( map, marker );

            });
        }

    }

    /*
    *  center_map
    *  This function will center the map, showing all markers attached to this map
    */

    function center_map( map ) {

        // vars
        var bounds = new google.maps.LatLngBounds();

        // loop through all markers and create bounds
        $.each( map.markers, function( i, marker ){

            var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

            bounds.extend( latlng );

        });

        // only 1 marker?
        if( map.markers.length == 1 )
        {
            // set center of map
            map.setCenter( bounds.getCenter() );
            map.setZoom( 16 );
        }
        else
        {
            // fit to bounds
            map.fitBounds( bounds );
        }

    }

    //Initialize the maps on ready
    $('.acf-map').each(function(){

        render_map( $(this) );

    });

    // Change the color of parent element
    $( ".dropdown" ).parent().css( "color", "dodgerblue" );

});