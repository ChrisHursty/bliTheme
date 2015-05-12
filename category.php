<?php
 
get_header(); ?>
<?php 
$merchants = get_posts( array(
   'post_type'      => 'events', 
   'posts_per_page' => -1
));

if( !empty($merchants) ): ?>

<div class="acf-map">
  <?php foreach($merchants as $merchant): ?>
    <?php
        $location = get_field('event_address',$merchant->ID);
        if( !empty($location) ): ?>
        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
        <?php endif; ?>
  <?php endforeach; ?>
  
</div>

<?php endif; ?> 
    <div class="row">
        <div class="small-12 large-12 columns" role="main">
            <div class="archiveCategories archiveExcerpt" role="main">
                <h1 class="archivePageTitle">Category Index Page</h1>
            </div>
            <div class="row">
                <h5>Egghead</h5>
            </div>
               
        </div><!-- /small-12 large-12 columns -->
    </div><!-- /row -->

<?php get_footer(); ?>