<?php get_header(); ?>
<div class="featuredImage-small">
    <?php if ( has_post_thumbnail() ) {
	the_post_thumbnail( 'featured-img-sm' );
	} else { ?>
	<img src="<?php bloginfo('template_directory'); ?>/assets/default-featured-img.jpg" alt="Bronx Little Italy" />
	<?php } ?>
</div>

<div class="row">
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
    	<div class="row">
            <?php if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('<p id="breadcrumbs">','</p>');
            } ?>
        </div>  
	    <header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
	</div> <!-- /small-12 large-12 columns -->
	<div class="small-12 large-8 columns" role="main">

		<?php do_action('bliTheme_before_content'); ?>

		<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<?php do_action('bliTheme_page_before_entry_content'); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				<footer>
					<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'bli-theme'), 'after' => '</p></nav>' )); ?>
					<p><?php the_tags(); ?></p>
				</footer>
				<?php do_action('bliTheme_page_before_comments'); ?>
				<?php comments_template(); ?>
				<?php do_action('bliTheme_page_after_comments'); ?>
			</article>
		<?php endwhile;?>
		<?php do_action('bliTheme_after_content'); ?>
	
	<?php get_sidebar(); ?>
</div> <!-- /row -->
<?php get_footer(); ?>
