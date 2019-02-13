<?php 
/*
    $slides = array(
        'class'     => 'slide_pieces',
        'slides'    => 'slides_slide'
    );
*/

?>

<section id="<?= $slides['class'] . '_section'; ?>" class="<?= $slides['class'] . '_section'; ?>">
        
    <?php if(have_rows($slides['slides'])) : ?>
        <?php while(have_rows($slides['slides'])) : the_row();?> 

        <?php 
            $headline   = get_sub_field('headline');
            $image      = get_sub_field('image');
            $background = wp_get_attachment_image_url($image, 'full');
            $button     = get_sub_field('button');
            $toggle     = get_sub_field('toggle');
            $text_color = get_Sub_field('color');

            if($toggle) {
                $toggle = 'flex-start';
            }
            else {
                $toggle = 'flex-end';
            }
        ?>

        <div class="<?= $slides['class'] . '_slide'; ?>" style="background-image: url(<?=$background; ?>)">
        <!--display: flex; -->
            <div class="<?= $slides['class'] . '_slide_container'; ?>" style="color: <?= $text_color; ?>; justify-content: <?= $toggle; ?>">
                <?php if($headline) : ?>
                    <h4 class="<?= $slides['class'] . '_headline'; ?>">
                        <?= $headline; ?>
                    </h4>
                <?php endif; ?>

                <?php if($button) :?>
                    <a 
                        class="<?= $slides['class']. '_button'; ?>" 
                        style="color: <?= $text_color; ?>;
                               border: 2px solid;
                               border-color: <?= $text_color; ?>"
                        href="<?= $button['url']; ?>" target="<?= $button['target']; ?>"
                    >
                        <?= $button['title']; ?>
                    </a>
                <?php endif; ?>

            </div>

        </div>

        <?php endwhile; ?>
    <?php endif; ?>


</section>