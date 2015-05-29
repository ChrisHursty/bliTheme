<div class="container">
    <div class="row header">
        <div class="branding">
            <a href="<?php echo home_url(); ?>"><h1 id="logo"><?php bloginfo('name'); ?></h1></a>
        </div>
        <div class="tagline">
            <h2 class="logoText">The Belmont Business Improvement District</h2>
        </div>
        <div id="mc4wp-form-1" class="form mc4wp-form bliTextInput">
            <form method="post" role="form">

                <div class="bliFormText">
                    <label>Sign Up for Our Newsletter</label>
                </div>
                <div class="bliFormField clearfix">
                    <input type="email" id="mc4wp_email" name="EMAIL" placeholder="Your email address" required="">
                    <div class="">
                        <input type="submit" value="Sign up" class="bliFormButton">
                    </div>
                </div>

                <input type="hidden" name="_mc4wp_required_but_not_really" value="" style="display: none;">
                <input type="hidden" name="_mc4wp_timestamp" value="1431611841">
                <input type="hidden" name="_mc4wp_form_id" value="0">
                <input type="hidden" name="_mc4wp_form_element_id" value="mc4wp-form-1">
                <input type="hidden" name="_mc4wp_form_submit" value="1">
                <input type="hidden" name="_mc4wp_form_nonce" value="7da1a396b0">
            </form>
        </div>

        <nav class="desktopNav" data-topbar role="navigation">
            <section class="top-bar-section">
                <?php bliTheme_top_bar_r(); ?>
            </section>
        </nav>
       
    </div> <!-- /row -->
</div>


