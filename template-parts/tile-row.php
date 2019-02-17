<?php
/*
    $tiles = array( 
        'class'  => 'tile-row',
        'tile'   => 'tile_row_tiles'
    );
    Going full width, As the 
*/
?>

<section class="<?= $tiles['class'] . '_section'; ?>">

    <div class="<?= $tiles['class'] . '_container'; ?>">

        <?php if($tiles['tile']) :?>

            <?php if(have_rows($tiles['tile'])) :?>

                <?php while(have_rows($tiles['tile'])) : the_row(); ?>

                    <?php 
                        $id = get_sub_field('image');
                        $image = wp_get_attachment_image_src( $id, 'full');
                        $title = get_sub_field('title');
                        $sub_title = get_sub_field('sub_title');
                        $link  = get_sub_field('link');
                        
                    ?> 

                <div class="<?= $tiles['class'] . '_tile_container'; ?>">
                    <a class="<?= $tiles['class'] . '_link'; ?>" href="<?= $link['url']; ?>">

                        <div class="<?= $tiles['class'] . '_tile'; ?>" style="background-image: url(<?= $image[0]; ?>)">
                    
                            <div class="<?= $tiles['class'] . '_text_container'; ?>">
                                <?php if($title) :?>

                                    <h3 class="<?= $tiles['class'] . '_title'; ?>">
                                        <?= $title; ?>
                                    </h3>

                                <?php endif; ?>

                                <?php if($sub_title) :?>

                                    <div class="<?= $tiles['class'] . '_sub_title'; ?>">
                                        <?= $sub_title; ?>
                                    </div>
                                    
                                <?php endif; ?>
                            </div>
                        
                        </div>

                      
                    </a>
                </div>              
                <?php endwhile; ?>

            <?php endif;?>

        <?php endif;?>

    </div>


</section>