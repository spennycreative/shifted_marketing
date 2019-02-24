<?php 
  $bg_color = get_sub_field('background_color');
    $bg = $bg_color ? 'background-color: ' . $bg_color . ';' : '';
  $txt_color = get_sub_field('text_color');
    $txt = $txt_color ? 'color: ' . $txt_color . ';' : '';
?>

<section class="layout--related-posts" style="<?php echo $bg; ?>">
  <div class="layout">
    <div class="d-flex df-column centered layout--related-posts-intro">
      <h2 style="<?php echo $txt; ?>"><?php echo get_sub_field('heading'); ?></h2>
      <p style="<?php echo $txt; ?>"><?php echo get_sub_field('sub_heading'); ?></p>
    </div>
    <div class="article-container d-flex df-column centered">
      <?php 
        $posts = get_sub_field('posts');
        if( $posts ): 
          foreach( $posts as $post): 
          setup_postdata($post);
      ?>
          <article id="related-post--<?php the_ID(); ?>">
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
          
        <?php 
          endforeach;
        wp_reset_postdata();
        endif;
      ?>
    </div>
    <div class="d-flex centered" style="margin-top: 20px;">
      <a class="btn secondary-btn" href="/blog/">Read All Posts</a>
    </div>
  </div>
</section>





