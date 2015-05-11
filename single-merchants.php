<?php
/**
 * Single Merchant Template
 *
 * @package bliTheme 
 */

get_header(); ?>

<?php 
$merchants = array(
    'post_type' => 'post',
    'tax_query' => array(
        array(
            'taxonomy' => 'business',
            'field'    => 'slug',
        ),
    ),
);

if( !empty($merchants) ): ?>

<div class="acf-map">
  <?php foreach($merchants as $merchant): ?>
    <?php
        $location = get_field('merchant_address',$merchant->ID);
        if( !empty($location) ): ?>
        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
        <?php endif; ?>
  <?php endforeach; ?>
  
</div>

<?php endif; ?>

<div class="row">
    <div class="small-12 large-12 columns" role="main">

    <?php do_action('bliTheme_before_content'); ?>

    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <header>
                <h1 class="entry-title"><?php the_title(); ?> / Hello 
                <?php
                    if( is_tax( 'business' ) ) {
                        echo '<h1>Bakers</h1>';
                    }
                    if( is_tax( 'butchers' ) ) {
                        echo '<h1>Butchers</h1>';
                    }
                    if( is_tax( 'cafes' ) ) {
                        echo '<h1>Cafe</h1>';
                    }
                    if( is_tax( 'delicatessens' ) ) {
                        echo '<h1>Delicatessens</h1>';
                    }
                ?>
                </h1>
                <?php bliTheme_entry_meta(); ?>
            </header>
            <?php do_action('bliTheme_post_before_entry_content'); ?>
            <div class="entry-content">

                <?php get_template_part( 'content', 'merchants' ); ?>
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

