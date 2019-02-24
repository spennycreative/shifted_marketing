<?php
/** header * @package shifted_marketing */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

		<!-- skip link focus -->
		<script type="text/javascript">
			( function() {
				var isIe = /(trident|msie)/i.test( navigator.userAgent );
				if ( isIe && document.getElementById && window.addEventListener ) {
					window.addEventListener( 'hashchange', function() {
						var id = location.hash.substring( 1 ),
							element;
						if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
							return;
						}
						element = document.getElementById( id );
						if ( element ) {
							if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
								element.tabIndex = -1;
							}
							element.focus();
						}
					}, false );
				}
			} )();
		</script>
		<!--/ skip link focus -->

		<!-- wrapper -->
		<div id="page" class="site">
			<?php 
				$logo = get_field('logo', 'options');
				$nav_cta = get_field('nav_cta', 'options');
				$nav_cta_url = get_field('nav_cta_url', 'options');
				$top_call_out = get_field('top_call_out', 'options');
				$top_call_out_phone = get_field('top_call_out_phone', 'options');
				$sticky_color = get_field('sticky_background_color', 'options') ? 'background-color: ' . get_field('sticky_background_color', 'options') . '; ' : '' ;
				$non_sticky_color = get_field('background_color', 'options') ? 'background-color: ' . get_field('background_color', 'options') . '; ' : '' ;
			?>
			<section class="top-nav-non-sticky" style="<?php echo $non_sticky_color; ?>">
				<div class="site-branding">
					<a href="<?php echo esc_url(home_url('/')); ?>"><img src="/wp-content/themes/shifted_marketing/assets/images/shifted_logo.svg" alt="Shifted Marketing Utah"></a>
				</div><!-- .site-branding -->
				<div class="social-icons">
				<?php if( have_rows('icons', 'options') ): 
						while( have_rows('icons', 'options') ): the_row();
						 $img = get_sub_field('social_media_icon', 'options');
						 $imgSrc = $img['url'];
						 $imgAlt = $img['alt'];
						 $imgLink = get_sub_field('social_link', 'options');
						?>
							<div class="icon-container">
								<a href="<?php echo $imgLink; ?>"><img src="<?php echo $imgSrc; ?>" alt="<?php echo $imgAlt; ?>"></a>
							</div>

					<?php endwhile;
						endif;
					?>
				</div>
			</section>

			<!-- header -->
			<header class="header" role="banner" style="<?php echo $sticky_color; ?>"> <!-- clear -->
			<!-- nav script -->
			<script type="text/javascript">
				jQuery(document).ready(function ($) {
					var itemHasChild = $('.nav .main-navigation .menu ul .menu-item-has-children');
					itemHasChild.append('<div id="carrot-rotate"><div id="carrot"> ^ </div></div>');
				});
			</script>
			<!--/ nav script -->
				<style type="text/css">.call-for-quote p { color: <?php the_field('text_color', 'options'); ?> !important; } .menu li a { color: <?php the_field('sticky_text_color', 'options'); ?> !important;}</style>
				<section class="nav heading-wrapper">
					<div class="site-branding">
						<a href="<?php echo esc_url(home_url('/')); ?>"><img src="/wp-content/themes/shifted_marketing/assets/images/shifted_logo.svg" alt="Shifted Marketing Utah"></a>
					</div><!-- .site-branding -->

					<!--desktop navigation -->
					<div id="site-navigation" class="main-navigation">
						<div id="primary-menu" class="menu">
							<?php
								wp_nav_menu( array(
										'theme_location'  => 'menu-1',
										'menu'            => 'main-menu',
										'container'       => 'div',
										'container_class' => 'menu-main-menu-container',
										'menu_class'      => 'menu',
										'menu_id'         => '',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '<ul class="menu">%3$s</ul>',
										'depth'           => 0,
										'walker'          => ''
								) );
							?>
						</div>

						<!-- mobile navigation -->
						<div id="mobile-primary-menu">
							<div id="mobile-hb-button">
								<input type="checkbox" />
								<span id="hb-button"></span>
								<span id="hb-button"></span>
								<span id="hb-button"></span>

								<?php
									wp_nav_menu( array(
										'theme_location'  => 'menu-1',
										'menu'            => 'main-menu',
										'container'       => false,
										'menu_class'      => 'menu',
										'menu_id'         => '',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '<ul class="menu">%3$s</ul>',
										'depth'           => 0,
										'walker'          => ''
									) );
								?>
							</div>							
						</div>
					</div><!-- #site-navigation -->

					<!-- header cta -->
					<div class="header-cta">
						<div class="search-wrapper" style="display:flex;">
							<?php get_search_form(); ?>
						</div>
						<!-- <a href="<?php echo $nav_cta_url; ?>"
							class="header-btn"
						>
							<?php echo $nav_cta; ?>
						</a> -->
					</div><!-- /desktop nav -->
				</section>
			</header>
			<!-- /header -->

	<div id="content" class="site-content">

<script type="text/javascript">
	jQuery('a').attr('target', function() {
		if(this.host == location.host) return '_self'
		else return '_blank'
	});
</script>