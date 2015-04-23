<?php get_header(); ?>
<div class="sliderHome">
    <div><img src="wp-content/themes/bli-theme/assets/slide1.jpg" alt=""></div>
    <div><img src="wp-content/themes/bli-theme/assets/slide2.jpg" alt=""></div>
    <div><img src="wp-content/themes/bli-theme/assets/slide3.jpg" alt=""></div>
</div>
<!--
<?php if ( has_post_thumbnail() ) : ?>
    <div class="homeSlider">
        <?php the_post_thumbnail('featured-img'); ?>
    </div>
<?php endif; ?>
-->
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

            <div class="bliSearchInput"> 
                <input type="text" placeholder="Search Food, Products, Places" />
                <div class="bliFormButton">
                    <a href=""><img src="/bli-wp/wp-content/themes/bli-theme/assets/svg/circle-right.svg" alt="Search Food, Products, Places"></a>
                </div>  
            </div> <!-- /bliSearchInput -->
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
                <h5><a href="">View All Events</a></h5>
                <fb:like href="<?php the_permalink() ?>" layout="button_count" show_faces="false" width="450" action="like" colorscheme="light"></fb:like>
                <ul class="small-block-grid-3">
                <!-- Custom Loop -->
                <?php $the_query = new WP_Query( 'showposts=3' ); ?>
                    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

                    <li class="mediaBlock">
                        <?php the_post_thumbnail();?>
                        <div class="mediaBlockText">
                            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                        </div>
                    </li>
                      
                    <?php endwhile;?>
                <!-- /Custom Loop -->
                </ul>
            </div> <!-- /row -->

            <!-- Begin Recent Events Section -->
            <!-- <div class="row">
                <h2>Sponsors</h2>
                <ul class="small-block-grid-3">
                    <li class="mediaBlock">
                        <img src="https://placekitten.com/g/600/400" alt="">
                        <div class="mediaBlockText">
                            <a href="#">Cause I Just can't go on...</a>
                        </div>
                    </li>
                    <li class="mediaBlock">
                        <img src="https://placekitten.com/g/600/400" alt="">
                        <div class="mediaBlockText">
                            <a href="#">Holy Generic Link Batman</a>
                        </div>
                    </li>
                    <li class="mediaBlock">
                        <img src="https://placekitten.com/g/600/400" alt="">
                        <div class="mediaBlockText">
                            <a href="#">Holy Generic Link Batman</a>
                        </div>
                    </li>
                </ul>    
            </div>  /row -->
        </section>
        

        <!-- Begin Social Media Section -->        
        <section class="homeSection">
            <div class="row">
                <h2>Follow Us On Social Media</h2>
                <div class="small-12 columns photoWall">
                    <div id="instafeed"></div>
                </div>
            </div>
            <div class="row">
                <div class="small-4 columns">
                    <?php dynamic_sidebar("homepage-facebook"); ?>
                </div>
                <div class="small-4 columns">
                    <div class="fb-page" data-href="https://www.facebook.com/BronxLittleItaly" data-width="500" data-height="600" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
                        <div class="fb-xfbml-parse-ignore">
                            <blockquote cite="https://www.facebook.com/BronxLittleItaly"><a href="https://www.facebook.com/BronxLittleItaly">Bronx Little Italy</a></blockquote>
                        </div>
                    </div>
                </div>
                <div class="small-4 columns">
                    <a class="twitter-timeline" href="https://twitter.com/BXLittleItaly" data-widget-id="511895354778738690">Tweets by @BXLittleItaly</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>    
            </div> <!-- /row -->
        </section>
            

        <!-- Begin Sponsors Section -->
        <section class="homeSection">
            <div class="row">
                <h2> Our Sponsors</h2>
                <ul class="small-block-grid-3">
                    <li class="sponsor">
                        <a href="#">
                            <img src="https://placekitten.com/g/600/400" alt="">
                        </a>
                    </li>
                    <li class="sponsor">
                        <a href="#">
                            <img src="https://placekitten.com/g/600/400" alt="">
                        </a>
                    </li>
                    <li class="sponsor">
                        <a href="#">
                            <img src="https://placekitten.com/g/600/400" alt="">
                        </a>
                    </li>
                </ul>    
            </div> <!-- /row -->
        </section>
        
	</div> <!-- /small-12 large-12 columns -->
</div> <!-- row homePage -->

<?php get_footer(); ?>
