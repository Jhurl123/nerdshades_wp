<?php
/**
 * Template Name: Page Builder
 */

get_header(); 
?>

<?php 
    if(have_rows('page-builder')) : ?>

        <?php while ( have_rows('page-builder') ): the_row(); {

            $layout = get_row_layout();

            switch($layout) {

                case 'hero_full_height':
                    get_template_part('template-parts/hero-full-height.php');
                    break;

            }

        }
        ?>

    <?php endif; ?>

<?php get_footer(): ?>