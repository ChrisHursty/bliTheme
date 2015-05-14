<li class="archiveBlock">
    <a href="<?php the_permalink(); ?>">
        <div class="archiveAnchor">
            <div class="archiveImg taxImg">
            <?php 
                if ( has_post_thumbnail() ) { 
                    the_post_thumbnail();
                } 
            ?>
            </div>
            <div class="archiveText">
                <div class="archiveTitle taxTitle">
                    <?php the_title(); ?>
                    <?php echo $current_merchant_type->name; ?>

                </div>
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
                </div> <!-- placeAddress -->
                
            </div> <!-- archiveText -->
        </div>
    </a>
</li>
