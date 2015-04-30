<?php get_header(); ?>

<div class="featuredImage-small">
	<?php
	// If There's a Thumbnail
	if ( has_post_thumbnail() ) { the_post_thumbnail('featured-img-sm'); } ?>
</div>

<div class="row">
	<div class="small-12 large-12 columns" role="main">

	<?php do_action('bliTheme_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<?php do_action('bliTheme_page_before_entry_content'); ?>
			<div class="entry-content contactContent">
				<?php the_content(); ?>
			</div>

		</article>
	<?php endwhile;?>

	<?php do_action('bliTheme_after_content'); ?>

	</div>
</div>
<?php get_footer(); ?>
