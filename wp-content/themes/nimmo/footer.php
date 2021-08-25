<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 *
 * @package Nimmo
 */
$back_totop_on = nimmo_get_opt('back_totop_on', true); ?>

		</div><!-- #content inner -->
	</div><!-- #content -->

	<?php if(!is_404()) { 
		nimmo_footer(); 
	} ?>

	<?php nimmo_hidden_sidebar(); ?>
	<?php nimmo_cart_sidebar(); ?>

	<?php if (isset($back_totop_on) && $back_totop_on) : ?>
	    <a href="#" class="ct-scroll-top">
	    	<i class="ti-angle-up"></i>
	    </a>
	<?php endif; ?>

	</div><!-- #page -->

	<?php wp_footer(); ?>
	
	<?php echo nimmo_get_opt( 'site_footer_code', '' ); ?>

	</body>
</html>
