<?php get_header(); ?>
<div class="featuredImage-small">
    <?php if ( has_post_thumbnail() ) {
	the_post_thumbnail( 'featured-img-sm' );
	} else { ?>
	<img src="<?php bloginfo('template_directory'); ?>/assets/default-featured-img.jpg" alt="Bronx Little Italy" />
	<?php } ?>
</div>

<div class="row">
	<div class="small-12 large-8 columns" role="main">

	<?php do_action('bliTheme_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php bliTheme_entry_meta(); ?>
			</header>
			<?php do_action('bliTheme_post_before_entry_content'); ?>
			<div class="entry-content">

			<?php the_content(); ?>
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
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
