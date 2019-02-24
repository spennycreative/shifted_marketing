<?php
  //variables
  $date = get_sub_field('small_description');
  $heading = get_sub_field('heading');
  $textArea = get_sub_field('text_area');
  $contentAlignment = get_sub_field('content_alignment');
  $boxShadow = get_sub_field('box_shadow');
  $position = get_sub_field('background_position') ? 'background-position: ' . get_sub_field('background_position') . ';' : '';
  $image = get_sub_field('background_image') ? 'background-image: url(' . get_sub_field('background_image') . ');' : '';

  //colors
  $textColor = get_sub_field('text_color') ? 'color: ' . get_sub_field('text_color') . '; ' : '';
  $backgroundColor = get_sub_field('background_color') ? 'background-color: ' . get_sub_field('background_color') . '; ' : '';
?>

<section class="layout--content-image-wrapper" style="<?php echo $textColor . $backgroundColor; ?>">
  <div class="layout content-image-container <?php echo $contentAlignment; ?>">
    <div class="content-image-content">
      <?php if( $date ) : ?>
      <p class="date-of-tour"><?php echo $date; ?></p>
      <?php endif; ?>
      <h3><?php echo $heading; ?></h3>
      <p><?php echo $textArea; ?></p>
        <div class="button-wrapper">
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
      </div>
      <div class="content-image <?php echo $boxShadow ?>" style="<?php echo $image . $position; ?>"></div>
  </div>
</section>