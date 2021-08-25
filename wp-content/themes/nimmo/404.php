<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Nimmo
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="error-404">
                <div class="container">
                    <div class="row">
                        <div class="error-404-content col-12">
                            <h2>4<span>0</span>4</h2>
                            <p><?php echo esc_html__( 'The page you’re looking is no longer available or is temporary removed. ', 'nimmo' ); ?></p>
                            <a class="btn" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Back To Home', 'nimmo'); ?></a>
                        </div>
                    </div>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
