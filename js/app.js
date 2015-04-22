jQuery( document ).ready(function( $ ) {

    // Slider - Home Page
    $('.sliderHome').slick({
        autoplay: true,
        autoplaySpeed: 1200,
        infinite: true,
        dots: true,
        slidesToShow:1,
        touchMove: true,
        slidesToScroll: 1,
        element: 'div'
    });

    // Instagram Feed

    $(function() {
     
        //Set up instafeed
        var feed = new Instafeed({
            clientId: '05ec09948b1142e79021a26595410275',
            target: 'instafeed',
            get: 'user',
            userId: 365961359,
            accessToken: '365961359.467ede5.4707c87a559b435b805815261d74fab1',
            links: true,
            limit: 12,
            sortBy: 'most-recent',
            resolution: 'standard_resolution',
            template: '<div class="instagramFeed"><a href="{{link}}" target="_blank"><img src="{{image}}"></a></div>'
        });
        feed.run(); 
    });

});



