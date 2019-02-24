<?php 
  $bg_color = get_sub_field('background_color');
    $bg = $bg_color ? 'background-color: ' . $bg_color . ';' : '';
  $txt_color = get_sub_field('background_color');
    $txt = $txt_color ? 'text-color: ' . $txt_color . ';' : '';
  $contentAlignment = get_sub_field('content_alignment');

?>

<section class="layout__content-cta " style="<?php echo $bg . $txt; ?>">
  <div class="layout d-flex df-column df-row-md-up centered <?php echo $contentAlignment; ?>">
    <div class="layout__content-container">
      <h2><?php echo get_sub_field('heading'); ?></h2>
      <p>
        <?php echo get_sub_field('text_area'); ?>
      </p>
      <?php
        if( have_rows('call_to_action') ): 
          while( have_rows('call_to_action') ) : 
          the_row(); 
          $text = get_sub_field('cta_text');
          $link = get_sub_field('cta_link');
          $style = get_sub_field('cta_style');
      ?>
        <a href="<?php echo $link; ?>" class="btn <?php echo $style; ?>"><?php echo $text; ?></a>
      <?php 
          endwhile;
        endif;
      ?>
    </div>
    <div class="layout__cta-container">
      <?php 
        if( have_rows('icon_block_cta') ) :
          while( have_rows('icon_block_cta') ) :
          the_row();
            $icon = get_sub_field('icon');
            $cta = get_sub_field('call_to_action');
            $link = get_sub_field('cta_link');
          ?>
          <a class="layoutCtaHover" href="<?php echo $link; ?>">
            <div class="layout__cta">
              <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
              <span><?php echo $cta; ?></span>
            </div>
          </a>
        <?php 
            endwhile;
          endif;
        ?>
    </div>
  </div>
</section>