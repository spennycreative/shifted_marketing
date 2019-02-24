<div class="category-filter-container">

    <script type="text/javascript">
    window.onload = function() {
      var clickMe = document.getElementById('click_me');

      clickMe.addEventListener('click', function(e) {
        e.preventDefault();

        var showCategories = document.querySelector('.category-list');
        showCategories.classList.toggle('hide_category');
        this.classList.toggle('arrow_rotate');

        if(this.classList.contains('arrow_rotate')) {
          this.classList.add('arrow_rotate_fast');
          var hideCategory = document.getElementById('text_to_toggle');
          hideCategory.innerText = 'Hide Categories';
        } else {
          this.classList.remove('arrow_rotate_fast');
          var hideCategory = document.getElementById('text_to_toggle');
          hideCategory.innerText = 'Show Categoies';
        }
      });

      let mobileCategorySelect;
      mobileCategorySelect = document.getElementById('mobile-category-selector');

      if ('undefined' !== typeof mobileCategorySelect && mobileCategorySelect !== null) {
        mobileCategorySelect.addEventListener('change', function (event) {
          window.location.href = event.target.value;
        });
      }
    }

    </script>
    <div class="show_category_button hide_on_mobile">
      <span id="click_me" class="img_wrapper">
        <img src="<?php echo get_template_directory_URI(); ?>/assets/images/arrow-secondary.svg" alt="">
      </span>
      <span id="text_to_toggle" class="current_text">
        Show Categories
      </span>
    </div>

    <ul class="category-list hide_category hide_on_mobile">
      <li><a class="btn secondary-btn" href="<?php  echo get_bloginfo('url'); ?>/blog/">All Categories</a></li>
      <?php 
        $blog_cat = get_categories( array(
          'hierarchical' => true,
          'parent'			 => 0,
        ) );

        if( is_array( $blog_cat ) ) {
          foreach( $blog_cat as $category ) {
            printf('<li><a class="btn secondary-btn" title="View archive for %s category" href="%s">%s</a></li>', $category->name, esc_url(get_category_link($category->term_id)), $category->name);
          }
        }
      ?>
    </ul>

    <select id="mobile-category-selector" class="mobile-category-list hide_on_desktop">
      <option value="">Select a category</option>
      <option value="<?php echo site_url(); ?>/blog/">All Categories</option>
      <?php 
        $blog_cat = get_categories( array(
          'hierarchical' => true,
          'parent'			 => 0,
        ) );

        if( is_array( $blog_cat ) ) {
          foreach( $blog_cat as $category ) {
            printf('<option value="%s">%s</option>', get_term_link($category), $category->name);
          }
        }
      ?>
    </select>

</div>