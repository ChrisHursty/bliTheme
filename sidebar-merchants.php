<aside id="sidebar" class="small-12 large-4 columns placesSidebar">

    <?php do_action('bliTheme_before_sidebar'); ?>
    <div class="placeAddress">
        <h6>Address</h6>
        <?php 
                                
        // Returns the Address from Google Map Place
        $contact_address = get_field('merchant_address');
        ?>
        <?php $address = explode( "," , $contact_address['address']);
        echo $address[0]; //street, number
        ?><br />
        <?php
        echo $address[1].','.$address[2]; //city, state + zip
        ?>
    </div>
    
    <div class="placeNumber">
        <h6>Phone Number</h6>
        <?php the_field('merchant_phone'); ?>    
    </div>

    <?php 
    if( $hours = get_field('merchant_hours') ) {
        ?> 
        <div class="placeHours">
        <h6>Opening Hours</h6>
            <?php the_field('merchant_hours'); ?>    
        </div>
        <?php
    }; ?>

    <?php 
    if( $website = get_field('merchant_website') ) {
        ?> 
        <div class="placeWeb">
            <h6>Website</h6>
            <a href="<?php the_field('merchant_website')?>" target="_blank">
                <?php the_field('merchant_website') ?></a>  
        </div>
        <?php
    }; ?>
    <div class="placeWidgets">
        <?php
            if ( $sidebar = dynamic_sidebar("sidebar-merchants") ) {
                is_active_widget('sidebar-merchants');
            };
        ?>
    </div>
    
    
    <?php do_action('bliTheme_after_sidebar'); ?>
</aside>