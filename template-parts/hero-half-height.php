<?php
/* 
* Half height Hero template part
*
*/
?>

<section class="hero_section">

    <div class="hero_container-half">

        <?php
            $image_id  = get_sub_field('hero_image');
            $image     = wp_get_attachment_image_src($image_id , 'hero_full');
            $title     = get_sub_field('hero_title');
            $sub_title = get_sub_field('hero_sub_title');
            $position  = get_sub_field('hero_text_position');
            $color     = get_sub_field('hero_color');
            $button    = get_sub_field('hero_button');
        ?>
            
        <div class="hero_img" style="background-image: url(<?php echo $image[0]; ?>);">

            <div class="hero_row row">

                <div class="hero_block columns large-12" style = "text-align:<?php echo $position; ?>; color: <?php echo $color; ?>">

                    <?php if($title) :?>
                        <h1 class="hero_title"><?php echo $title; ?></h1>
                    <?php endif; ?>

                    <?php if($sub_title) : ?>
                        <h4 class="hero_sub-title"><?php echo $sub_title; ?></h4>
                    <?php endif; ?>

                    <?php if($button) : ?>
                        <button class="hero_button">
                            <a  href="<?= $button['url']; ?>"><?= $button['title']; ?></a>
                        </button>
                    <?php endif; ?>
                        
                </div>

            </div>

        </div>

    </div>

</section>