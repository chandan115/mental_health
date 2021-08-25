<?php
if(is_404()) { 
	return;
}
$titles = nimmo_get_page_titles();
ob_start();
if ( $titles['title'] )
{
    printf( '<h1 class="page-title">%s</h1>', esc_attr($titles['title']) );
}
$titles_html = ob_get_clean();
$ptitle_on = nimmo_get_opt( 'ptitle_on', 'show');
$page_ptitle_on = nimmo_get_page_opt( 'ptitle_on', 'themeoption');
if(is_page() && !empty($page_ptitle_on) && $page_ptitle_on != 'themeoption' || is_archive() && !empty($page_ptitle_on) && $page_ptitle_on != 'themeoption') {
	$ptitle_on = $page_ptitle_on;
} 
$ptitle_breadcrumb_on = nimmo_get_opt( 'ptitle_breadcrumb_on', 'show' );
?>
<?php if($ptitle_on == 'show') : ?>
	<div id="pagetitle" class="page-title bg-overlay">
	    <div class="container">
	        <div class="page-title-inner">
	            <?php printf( '%s', wp_kses_post($titles_html)); ?>
	            <?php if($ptitle_breadcrumb_on == 'show') : ?>
	            	<?php nimmo_breadcrumb(); ?>
	            <?php endif; ?>
	        </div>
	    </div>
	</div>
<?php endif; ?>