<?php get_header(); ?>

<div class="row">
	<div class="small-12 large-8 columns" role="main">

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php _e('File Not Found', 'bli-theme'); ?></h1>
			</header>
			<div class="entry-content">
				<div class="error">
					<p class="bottom"><?php _e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'bli-theme'); ?></p>
				</div>
				<p><?php _e('Please try the following:', 'bli-theme'); ?></p>
				<ul>
					<li><?php _e('Check your spelling', 'bli-theme'); ?></li>
					<li><?php printf(__('Return to the <a href="%s">home page</a>', 'bli-theme'), home_url()); ?></li>
					<li><?php _e('Click the <a href="javascript:history.back()">Back</a> button', 'bli-theme'); ?></li>
				</ul>
			</div>
		</article>

	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
