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
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'bli-theme'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php comments_template(); ?>
		</article>
	<?php endwhile; // End the loop ?>
    
        <div class="row"> 
            <h2>Upcoming &amp; Recent Events</h2>
            <h5><a href="">View All Events</a></h5>
            <ul class="small-block-grid-3">
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
                <li class="mediaBlock">
                    <img src="https://placekitten.com/g/600/400" alt="">
                    <div class="mediaBlockText">
                        <a href="#">Holy Generic Link Batman</a>
                    </div>
                </li>
            </ul>    
        </div> <!-- /row -->

        <div class="row">
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
        </div> <!-- /row -->

        <div class="row">
            <h2>Folow Us On Social Media</h2>
            
        </div>
        <div class="row">
            <ul class="small-block-grid-3">
                <li class="mediaBlock">
                    Instagram
                </li>
                <li class="mediaBlock">
                    <img src="https://placekitten.com/g/600/400" alt="">
                    <div class="mediaBlockText">
                        <a href="#">Holy Generic Link Batman</a>
                    </div>
                </li>
                <li class="mediaBlock">
                    <a class="twitter-timeline" href="https://twitter.com/ChrisHursty" data-widget-id="577494626870943744">Tweets by @ChrisHursty</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </li>
            </ul>    
        </div> <!-- /row -->
    

	</div> <!-- /small-12 large-12 columns -->
</div> <!-- row homePage -->

<?php get_footer(); ?>
