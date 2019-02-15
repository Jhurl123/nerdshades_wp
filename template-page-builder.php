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
                
                case "content_band":
                    include get_template_directory() . '/template-parts/content-band.php';
                    break;

                case "product_cards":
                    $cards = array(
                        'class'            => 'product_cards',
                        'headline'         => get_sub_field('product_cards_headline'),
                        'background_color' => get_sub_field('product_cards_background_color'),
                        'cards'            => 'product_cards_cards'
                    );
                    include get_template_directory() . '/template-parts/product-cards.php';
                    break;

                case "slide_pieces":
                    $slides = array(
                        'class'     => 'slide_pieces',
                        'slides'    => 'slides_slide'
                    );
                    include get_template_directory() . '/template-parts/slide-pieces.php';
                    break;

                case 'tile_row':
                    $tiles = array( 
                        'class'  => 'tile-row',
                        'image'  => get_sub_field('image'),
                        'title'  => get_sub_field('title'),
                        'link'   => get_sub_field('link')
                    );
                    include get_template_directory() . '/template-parts/tile-row.php';
                    break;
                    
                default:
                    break;

            }

         endwhile; ?>
    

    <?php endif; ?>

<?php get_footer(); ?>