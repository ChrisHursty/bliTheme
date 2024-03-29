<?php get_header(); ?>
    <!-- Home Page Slider -->
    <?php 
    // Query Arguments
        $args = array(
            'post_type'         => 'slides',
            'posts_per_page'    => 5
        );  
        
        // The Query
        $the_query = new WP_Query( $args );
        
        // Check if the Query returns any posts
        $the_query->have_posts()
        
        // Start the Slider ?>
        <div class="sliderHome">
            <?php       
            // The Loop
            while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div>
                <?php 
                // The Slide's Image
                echo the_post_thumbnail('homeSlider'); ?>
                </div>
            <?php endwhile; ?>
        
        </div><!-- /sliderHome -->        
        <?php 
        // Reset Post Data
        wp_reset_postdata();
    ?>
    <!-- /Home Page Slider -->

<div class="row homePage">
    <div class="small-12 large-12 columns" role="main">
        <div class="row">
            <div class="socialLinks">
                <ul>
                    <li class="facebook"><a href="http://facebook.com/BronxLittleItaly" target="_blank"></a></li>
                    <li class="twitter"><a href="http://twitter.com/BXLittleItaly" target="_blank"></a></li>
                    <li class="instagram"><a href="http://instagram.com/bronxlittleitaly/" target="_blank"></a></li>    
                </ul>
            </div> <!-- /socialLinks -->

            <form role="search" method="get" class="bliSearchInput" action="<?php echo home_url( '/' ); ?>">
                <label>
                    <input type="search" placeholder="Search Food, Products, Places" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
                </label>
                <a href=""><input type="submit" class="bliFormButton" /></a>
            </form> <!-- /bliSearchInput -->
        </div> <!-- /row -->

        <!-- Begin Intro/Loop Section -->
        <section class="homeSection">
            <?php /* Start loop */ ?>
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <div class="entry-content">
                        <h2><?php the_title(); ?></h2>
                        <div class="row">
                            <div class="small-10 small-offset-1 columns">
                                <?php the_content(); ?>    
                            </div>   
                        </div>
                    </div>

                </article>
            <?php endwhile; // End the loop ?>
        </section>
            
        <!-- Begin Recent Post & Events Section -->
        <section class="homeSection">
            <div class="row recentMediaBlock">
                <h2>Upcoming &amp; Recent Events</h2>
                <h5><a href="<?php get_home_url(); ?>/events">View All Events</a></h5>
                <!-- Events Posts -->
                <?php 
                // Query Arguments
                    $args = array(
                        'post_type'         => 'events',
                        'posts_per_page'    => 3
                    );  
                    
                    // The Query
                    $events_query = new WP_Query( $args );
                    
                    // Check if the Query returns any posts
                    $events_query->have_posts()
                    
                // Start the Events Posts ?>
                <ul class="small-block-grid-1 medium-block-grid-3">
                    <?php       
                    // The Loop
                    while ( $events_query->have_posts() ) : $events_query->the_post(); ?>
                        <li class="mediaBlock">
                            <a href="<?php the_permalink() ?>">
                                <?php the_post_thumbnail(); ?>
                            </a>
                            <div class="facebook"><a href="http://facebook.com/BronxLittleItaly" target="_blank"></a></div>
                            <div class="twitter"><a href="http://twitter.com/BXLittleItaly" target="_blank"></a></div>
                            <div class="mediaBlockText">
                                <a href="<?php the_permalink() ?>"><?php the_title(); ?></a><br/>
                                <?php the_field('event_excerpt'); ?><br/>
                                <a href="<?php the_permalink(); ?>" class="readMore">Read More...</a>
                            </div>
                        </li>
                    <?php endwhile; ?>   
                <?php // Reset Post Data
                    wp_reset_postdata();
                ?>
                </ul>
                <!-- /Events Posts -->
            </div> <!-- /row -->
        </section>
        
        <!-- Begin Social Media Section -->        
        <section class="homeSection">
            <div class="row">
                <h2>Follow Us On Social Media</h2>
                <div class="socialLinks socialMobile">
                    <ul>
                        <li class="facebook"><a href="http://facebook.com/BronxLittleItaly" target="_blank"></a></li>
                        <li class="twitter"><a href="http://twitter.com/BXLittleItaly" target="_blank"></a></li>
                        <li class="instagram"><a href="http://instagram.com/bronxlittleitaly/" target="_blank"></a></li>    
                    </ul>
                </div> <!-- /socialLinks -->
                <div class="small-12 columns photoWall">
                    <div id="instafeed"></div>
                </div>
            </div>
            <div class="row">
                <div class="small-12 medium-8 columns homeFacebook">
                    <?php dynamic_sidebar("homepage-facebook"); ?>
                </div>
                <div class="small-12 medium-4 columns homeTwitter">
                    <a class="twitter-timeline" href="https://twitter.com/BXLittleItaly" data-widget-id="511895354778738690">Tweets by @BXLittleItaly</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>    
            </div> <!-- /row -->
        </section>
            

        <!-- Begin Sponsor Section -->
        <section class="homeSection">
            <div class="row">
            <!-- Query Custom Post Type -->
            <?php query_posts('post_type=sponsor'); ?>
            <?php /* Start loop */ ?>
                <h2>Our Sponsors</h2>
                <ul class="small-block-grid-1 medium-block-grid-3 sponsors">
                <?php while (have_posts()) : the_post(); ?>
                    <li class="sponsor">
                        <a href="<?php the_field('bli_sponsor_link'); ?>" target="_blank">
                            <img class="sponsorImage" src="<?php the_field( 'bli_sponsor_image' ); ?>" alt="<?php the_field('bli_sponsor_name'); ?>" label="<?php the_field('bli_sponsor_name'); ?>">
                        </a>
                    </li>
                <?php endwhile; ?>
                </ul>    
            </div> <!-- /row -->
            
        </section>
        
    </div> <!-- /small-12 large-12 columns -->
</div> <!-- row homePage -->

<?php get_footer(); ?>