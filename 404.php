<?php
/** 404 template * @package shifted_marketing */
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="error-404 not-found">
				<header class="page-header">
					<section class="default-hero--wrapper">
						<div class="background-underlay theme theme__default" ></div>
						<div class="default-hero--content-container">
							<div class="default-hero--text-area">
								<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'shifted_marketing' ); ?></h1>
								<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'shifted_marketing' ); ?></p>
								<br />
								<div class="search-wrapper">
									<?php get_search_form(); ?>
								</div>
							</div>
						</div>
					</section>			
				</header><!-- .page-header -->

				<div class="page-content">
					<section class="layout--related-posts">
						<div class="layout">
							<div class="d-flex df-column centered layout--related-posts-intro">
								<h2>Check out some of our recent posts</h2>
								<p><?php echo get_sub_field('sub_heading'); ?></p>
							</div>
							<div class="article-container d-flex df-column centered">
								<?php 
									$args = array(
										'posts_per_page' => 5,
									);
									$posts = get_posts( $args );

									if( $posts ): 
										foreach( $posts as $post): 
										setup_postdata($post); ?>

										<article id="related-post--<?php the_ID(); ?>">
											<div class="article-info">
													<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
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
										
									<?php 
										endforeach;
									wp_reset_postdata();
									endif;
								?>
							</div>
						</div>
					</section>
					<section class="layout--case-studies" style="<?php echo $bg; ?>">
						<div class="layout">
							<div class="d-flex df-column centered layout--case-studies-intro" style="padding-bottom: 20px;<?php echo $txt; ?>">
								<h2>Our Featured Work</h2>
							</div>
							<div class="d-flex case-study-container">
								<?php 
									$args = array(
										'posts_per_page' => 4,
										'post_type'			 => 'case_study'
									);
									$posts = get_posts( $args );
									if( $posts ): 
										foreach( $posts as $post): 
										setup_postdata($post); 
										$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
										?>

										<article id="case-study-<?php the_ID(); ?>">
											<div class="case-study-bg-img">
												<img src="<?php echo $backgroundImg[0]; ?>" alt="">
											</div>
											<div class="case-study-info">
												<div class="case-study-wrapper">
													<h3><?php the_title(); ?></h3><br>
													<span>Posted by: <?php the_author(); ?></span><br>
													<a class="btn primary-btn" href="<?php the_permalink(); ?>">Read More</a>
												</div>
											</div>
										</article>
										
									<?php 
										endforeach;
									wp_reset_postdata();
									endif;
								?>
							</div>
							<div class="d-flex centered" style="position: relative; top: -10px; z-index: 10;">
								<a class="btn secondary-btn" href="/case-studies/">Read All Case Studies</a>
							</div>
						</div>
					</section>


				</div><!-- .page-content -->
			</div><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
