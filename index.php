<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shifted_marketing
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<section class="default-hero--wrapper">
			<div class="background-underlay theme theme__default" ></div>
		</section>

		<section class="index--result-contents">
		<div class="index--text-area">
			<h1 class="page-title" style="padding-bottom: 10px;">The Shifted Marketing Blog</h1>
			<p>Not seeing the post you wanted? Narrow your results by selecting a category below.</p>
		</div>

		<?php echo get_template_part('template-parts/partials/category', 'filter'); ?>

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
					the_posts_navigation();
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
			?>
		</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
