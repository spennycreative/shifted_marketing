<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shifted_marketing
 */
?>
<section class="layout--related-posts post-archive" style="max-width: 1285px; margin: auto;">
		<div class="article-container d-flex df-column centered">
			<article id="search-archive related-post--<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="article-info">
						<h3><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 3 ); ?></a></h3>
						<span class="cat-related-post">Category: <?php the_category(' '); ?></span><br>
						<?php shifted_marketing_posted_by(); ?><br>
						<?php shifted_marketing_posted_on(); ?>
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
