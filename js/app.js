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
    $(".small-block-grid-3").each(function() {
        var $this = $(this);
        $this.html($this.html().replace(/&nbsp;/g, ''));
    });

});



