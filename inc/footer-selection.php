<?php

/**
 * Get ACF Layout
 */
    if ( have_rows( 'footer_layout', 'options' ) ) {

        while ( have_rows( 'footer_layout', 'options' ) ) {

            the_row();

            switch ( get_row_layout() ) {

                case 'pre_footer_callout' :
                    get_template_part('template-parts/footer', 'pre_footer_callout');
                    break;

                case 'main_footer_area' :
                    get_template_part('template-parts/footer', 'main_footer_area');
                    break;

                case 'warning' :
                    get_template_part('template-parts/footer', 'warning');
                    break;
            }
        }
    }
    