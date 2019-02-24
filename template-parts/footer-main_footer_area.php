<?php
  //variables
  $logo = get_sub_field('logo');
  $textColor = get_sub_field('text_color') ? 'color: ' . get_sub_field('text_color') . '; ' : '';
  $backgroundColor = get_sub_field('background_color') ? 'background-color: ' . get_sub_field('background_color') . '; ' : '';
?>

<section class="main-footer-area-section" style="<?php echo $textColor . $backgroundColor; ?>">
  <div class="main-footer-area-logo">
    <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
  </div>
    <div class="main-footer-area-content">
        <?php
          wp_nav_menu(array(
            'theme_location' => 'footer-menu',
            'menu-id'        => 'footer-menu',
          ));
        ?>
    </div>
</section>