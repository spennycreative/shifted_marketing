<?php 
  $bg_color = get_sub_field('background_color');
    $bg = $bg_color ? 'background-color: ' . $bg_color . ';' : '';
  $txt_color = get_sub_field('background_color');
    $txt = $txt_color ? 'text-color: ' . $txt_color . ';' : '';
?>

<section class="layout--case-studies" style="<?php echo $bg; ?>">
  <div class="layout">
    <div class="d-flex df-column centered layout--case-studies-intro" style="padding-bottom: 20px;<?php echo $txt; ?>">
      <h2><?php echo get_sub_field('heading'); ?></h2>
      <p><?php echo get_sub_field('sub_heading'); ?></p>
    </div>
    <div class="d-flex case-study-container">
      <?php 
        $posts = get_sub_field('case_studies');
        if( $posts ): 
          foreach( $posts as $post): 
          setup_postdata($post); 
          $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
          $icon = get_field('company_logo', $post->ID);
          ?>

          <article id="case-study-<?php the_ID(); ?>">
            <div class="case-study-bg-img">
              <img src="<?php echo $backgroundImg[0]; ?>" alt="">
            </div>
            <div class="case-study-info">
              <div class="case-study-wrapper">
                <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                <h4><?php echo wp_trim_words( get_the_title(), 3 ); ?></h4><br>
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
    <div class="d-flex centered" style="position: relative; top: 25px; z-index: 4;">
      <a class="btn secondary-btn" href="/case-studies/">Read All Case Studies</a>
    </div>
  </div>
</section>