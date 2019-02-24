<?php
/** * @package shifted_marketing */
get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="search-result-page site-main">

		<?php if ( have_posts() ) : ?>

				<section class="default-hero--wrapper">
					<div class="background-underlay theme theme__default" ></div>
					<div class="default-hero--content-container">
						<div class="default-hero--text-area">
							<h2 class="page-title" style="padding-bottom: 10px;">Shifted Marketing</h2>
							<div class="search-query-results"><?php printf( esc_html__( 'Your results for: %s', 'shifted_marketing' ), '<span style="font-weight: bold;">' . get_search_query() . '</span>' ); ?></div>
							<br />
							<div class="search-wrapper">
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>
				</section>			

				<section class="search-contents">
					<style>
						.search-contents {
							background-color: white;
							position: relative;
							z-index: 1;
							max-width: 1250px;
							margin: auto 5%;
							padding: 15px;
							top: -225px;
							bottom: 50px;
							border-radius: 5px;
							box-shadow: 0 -20px 35px -14px rgba(0,0,0,.5);
						}

						@media screen and (min-width: 1250px) {
							.search-contents {
								margin: auto;
								padding: 25px 25px 200px 25px;
								top: -200px;
							}
						}

						#search-archive, .type-page {
							justify-content: center;
							align-items: center;
							width: 95%;
						}
					</style>
					<h2>Your <?php printf( esc_html__( '%s', 'shifted_marketing' ), '<span style="text-decoration: underline;">' . get_search_query() . '</span>' ); ?> results are below...</h2>
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</section>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
// get_sidebar();
get_footer();
