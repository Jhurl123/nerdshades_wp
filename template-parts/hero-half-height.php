<?php
/* 
* Half height Hero template part
*
*/
?>

<section class="hero_section">

    <?php $slides = get_sub_field('hero_slides'); ?>

    <?php if($slides) : ?>

        <div class="hero_container">

            <?php foreach( $slides as $slide) : ?>

                <?php
                    $image_id  = $slide['image'];
                    $image     = wp_get_attachment_image_src($image_id , 'hero_full');
                    $title     = $slide['title'];
                    $sub_title = $slide['sub_title'];
                    $position  = $slide['text_position'];
                ?>
                
                <div class="hero_img" style="background-image: url(<?php echo $image[0]; ?>);">

                    <div class="hero_row row">

                        <div class="hero_block columns large-12" style = "text-align:<?php echo $position; ?>">

                            <?php if($title) :?>
                                <h1 class="hero_title"><?php echo $title; ?></h1>
                            <?php endif; ?>

                            <?php if($sub_title) : ?>
                                <span class="hero_sub-title"><?php echo $sub_title; ?></span>
                            <?php endif; ?>
                                

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>
    
    <?php endif; ?>

</section>