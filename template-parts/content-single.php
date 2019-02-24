<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shifted_marketing
 */

?>

<section class="single-post-container">
	<div class="article-container d-flex df-column centered">
		<article id="single-post post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="article-info">
				<div class="split-header-a">
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="split-header-b">
					<?php
							if ( 'post' === get_post_type() ) :
							shifted_marketing_posted_by(); ?><br>
					<?php 
							shifted_marketing_posted_on(); 
							endif;		
					?><br>
					<span class="cat-related-post">Category: <?php the_category(' '); ?></span>
				</div>
			</div>
			<div class="article-content d-flex df-column">
					<div class="content-container">
						<?php
							the_content( sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'shifted_marketing' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									get_the_title()
								) );
							?>
					</div>
			</div>
		</article>
	</div>

	<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
	?>
</section>

<!-- <section class="single--random-posts">
	<h2>Check out some of our other posts</h2>
	<div class="recent-posts-single">
		<?php
			global $post;
			$args = array( 'posts_per_page' => 4, 'orderby' => 'rand' );
			$rand_posts = get_posts( $args );
			foreach ( $rand_posts as $post ) : setup_postdata( $post );
		?>
		<a href="<?php the_permalink(); ?>">
		<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'small' ); ?>
			<div class="recent-posts-bg-image" style="background-image: url('<?php echo $thumb['0'];?>');">
			<div class="black-bg-overlay"></div>
					<h3><?php the_title(); ?></h3>
					<p><?php the_author(); ?></p>
			</div>
		</a>
		<?php endforeach; 
			wp_reset_postdata();
		?>
	</div>
</section> -->