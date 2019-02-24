<?php

/**
 * Component Selector
 * 
 * Get ACF Layout
 */
    if ( have_rows( 'layout_builder' ) ) {

        while ( have_rows( 'layout_builder' ) ) {

            the_row();

            switch ( get_row_layout() ) {

                case 'layout_content_cta' :
                    get_template_part('template-parts/layout-builder/content', 'cta');
                    break;

                case 'layout_related_posts' :
                    get_template_part('template-parts/layout-builder/related', 'posts');
                    break;

                case 'layout_content_image' :
                    get_template_part('template-parts/layout-builder/content', 'image');
                    break;

                case 'layout_case_studies' :
                    get_template_part('template-parts/layout-builder/case', 'study');
                    break;
            }
        }
    }
    