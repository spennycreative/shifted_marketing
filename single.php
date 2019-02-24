<?php
/** * @package shifted_marketing */
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<section class="single-header-wrapper default-hero--wrapper">
				<div class="background-underlay theme theme__default" ></div></div>
			</section>	

		<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'single' );

				the_post_navigation();

			endwhile; // End of the loop.

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
