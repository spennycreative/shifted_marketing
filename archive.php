<?php
/** * @package shifted_marketing */
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : 
				$term = get_queried_object();
				$icon = get_field('icon', $term);
			?>

			<section class="archive-header-wrapper default-hero--wrapper">
				<div class="background-underlay theme theme__default" ></div>
				<div class="default-hero--content-container">
					<div class="default-hero--text-area">
						
						<div class="cat_wrapper">
							<h2 class="page-title" style="padding-bottom: 10px;"><?php the_archive_title(); ?></h2>
							<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
						</div>
						<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
						<!-- <br />
						<div class="default-hero--cta-wrapper">
								<a href="#" class="btn primary-btn">Read more</a>
						</div> -->
					</div>
				</div>
			</section>

			<section class="arhive-contents">

			<?php echo get_template_part('template-parts/partials/category', 'filter'); ?>

			<style>
				.arhive-contents {
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
					.arhive-contents {
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

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
