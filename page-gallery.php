<?php

/*
* Template Name: Gallery Page
*/

get_header(); ?>

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
            <h2 class="entry-title"><?php the_title(); ?></h2>
        </header>
    </div>

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
