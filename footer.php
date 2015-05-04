</section>

<footer class="row">
    <div class="footerContent">
        <?php do_action('bliTheme_before_footer'); ?>
        <div class="row textBg">
            <?php dynamic_sidebar("footer-widgets"); ?>    
        </div>
        
        <?php do_action('bliTheme_after_footer'); ?>
    </div>

</footer>
<a class="exit-off-canvas"></a>

	<?php do_action('bliTheme_layout_end'); ?>
	</div>
</div>
<?php wp_footer(); ?>
<?php do_action('bliTheme_before_closing_body'); ?>
</body>
</html>
