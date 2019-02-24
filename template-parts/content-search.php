<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shifted_marketing
 */
	// $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	// $heading_color = get_field('heading_color') ? 'color: ' . get_field('heading_color') . ' !important; ' : '';
?>

	<section class="layout--related-posts" style="max-width: 1285px; margin: auto;">
			<div class="article-container d-flex df-column centered">
				<article id="search-archive related-post--<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="article-info">
							<h3><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 3 ); ?></a></h3>
							<span class="cat-related-post">Category: <?php the_category(' '); ?></span><br>
							<span>Posted by: <?php the_author(); ?></span>
					</div>
					<div class="article-content d-flex df-column df-row-md-up">
							<div class="excerpt-container">
								<?php the_excerpt(); ?>
							</div>
							<div class="article-button-contianer">
								<a class="btn primary-btn" href="<?php the_permalink(); ?>">Read More</a>
							</div>
					</div>
				</article>
			</div>
	</section>