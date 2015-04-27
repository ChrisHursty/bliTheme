<?php get_header(); ?>
<div class="placesMap">
	
	<?php 
	// Map from ACF Google Map
	$location = get_field('place_address');

	if( !empty($location) ):
	?>
	<div class="acf-map">
		<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
	</div>
	<?php endif; ?>
</div>
<div class="row">

<h1><?php the_title(); ?></h1>
	<div class="small-12 large-8 columns" role="main">

	<?php do_action('bliTheme_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			


			<?php do_action('bliTheme_post_before_entry_content'); ?>
			<div class="entry-content">

			<?php if ( has_post_thumbnail() ): ?>
				<div class="row">
					<div class="column">
						<?php the_post_thumbnail('', array('class' => 'th')); ?>
					</div>
				</div>
			<?php endif; ?>
			
			<?php the_content(); ?>
			<?php bliTheme_entry_meta(); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'bli-theme'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php do_action('bliTheme_post_before_comments'); ?>
			<?php comments_template(); ?>
			<?php do_action('bliTheme_post_after_comments'); ?>
		</article>
	<?php endwhile;?>

	<?php do_action('bliTheme_after_content'); ?>

	</div>
	<?php get_sidebar('places'); ?>
</div>
<?php get_footer(); ?>
