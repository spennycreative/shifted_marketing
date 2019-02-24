<?php
/** * @package shifted_marketing * Template Name: Layout Builder */
get_header();
?>

	    <div id="primary" class="content-area">
        <main id="main" class="site-main">
			<section class="default-hero--wrapper">
                <div class="background-underlay theme theme__<?php echo get_field('header_theme'); ?>" ></div>
				<div class="default-hero--content-container">
					<div class="default-hero--text-area">
						<h1><?php the_title(); ?></h1>
						<p><?php echo get_field('header_content'); ?></p>
					</div>
					<div class="default-hero--cta-wrapper">
					<?php
						if( have_rows('call_to_action') ): 
							while( have_rows('call_to_action') ) : 
							the_row(); 
							$text = get_sub_field('cta_text');
							$link = get_sub_field('cta_link');
							$style = get_sub_field('cta_style');
					?>
						<a href="<?php echo $link; ?>" class="btn <?php echo $style; ?>"><?php echo $text; ?></a>
					<?php 
							endwhile;
						endif;
					?>
					</div>
				</div>
			</section>

            <?php
            while (have_posts()) :
                the_post();

                include get_template_directory() . '/inc/layout-selection.php';

            endwhile; // End of the loop.
            ?>

            <?php if (get_edit_post_link()) : ?>
                <footer class="entry-footer">
                    <?php
                    edit_post_link(
                        sprintf(
                            wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                                __('Edit <span class="screen-reader-text">%s</span>', 'shifted_marketing'),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            get_the_title()
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                    ?>
                </footer><!-- .entry-footer -->
            <?php endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
// get_sidebar();
get_footer();