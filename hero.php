<?php
/*
Template Name: Hero
*/
get_header(); ?>

<header id="homepage-hero" role="banner">
	<div class="row">
		<div class="small-12 medium-7 columns">
			<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
			<h4 class="subheader"><?php bloginfo('description'); ?></h4>
		</div>

		<div class="medium-6 columns end">
			<a role="button" class="download large button hide-for-small" href="https://github.com/olefredrik/bliTheme">Download bliTheme</a>
		</div>

		<div class="floatingyeti show-for-medium-up">
			<img data-cfsrc="http://foundation.zurb.com/assets/img/homepage/hero-image.svg" alt="Foundation Yeti" src="http://foundation.zurb.com/assets/img/homepage/hero-image.svg">
		</div>
	</div>

</header>

	<div class="row">
		<div class="small-12 large-8 columns" role="main">

		<?php do_action('bliTheme_before_content'); ?>

		<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<header>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
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

		</div>

	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
