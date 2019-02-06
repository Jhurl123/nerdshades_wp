<?php
/**
 * Template Name: Page Builder
 */

get_header(); 
?>

<?php

    if(have_rows('page_builder')) : ?>

        <?php while ( have_rows('page_builder') ): the_row(); 

            $layout = get_row_layout();

            switch($layout) {

                case 'hero_slider':
                    $toggle = get_sub_field('hero_size_toggle');

                    if($toggle == 'full-height') {
                        include get_template_directory() . '/template-parts/hero-full-height.php';
                        break;
                    }
                    else {
                        include get_template_directory() . '/template-parts/hero-half-height.php';
                        break;
                    }

                case "hero_half_height":
                    include get_template_directory() . '/template-parts/hero-half-height.php';
                    break;
                
                default:
                    break;

            }

         endwhile; ?>
    

    <?php endif; ?>

<?php get_footer(); ?>