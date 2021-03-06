<?php
 wp_enqueue_style('slick');
 wp_enqueue_style('slick-theme');
 wp_enqueue_script('slick');
/*
$cards = array(
    'class'            => 'product_cards',
    'headline'         => get_sub_field('product_cards_headline'),
    'background_color' => get_sub_field('product_cards_background_color'),
    'cards'            => 'product_cards_product'
);

*/
?>
<section class="<?= $cards['class'] . '_section'; ?>" style="background-color: <?= $cards['background_color']; ?>">
    <div class = "<?= $cards['class']. '_container'; ?> row">

        <?php if($cards['headline']) : ?>
            <h2 class="<?= $cards['class'] . '_headline'; ?> columns small-12 text-center">
                <?= $cards['headline']; ?>
            </h2>   
        <?php endif; ?>

</div>
    <div class="<?= $cards['class'] . '_card_row'; ?> row">
        <?php if(have_rows($cards['cards'])) : ?>
            <?php while(have_rows($cards['cards'])) : the_row(); ?>
                <?php
                    $posts = get_sub_field('product');
                ?>

                <?php if($posts ): ?>
                    <?php foreach($posts as $p) : ?>
                        <?php 
                            $title        = get_the_title($p->ID);
                            $price        = get_field('price', $p->ID);
                            $color        = get_field('color', $p->ID);
                            $images       = get_field('images', $p->ID);
                            $tags         = get_field('tags', $p->ID);
                            $model        = get_field('model_number', $p->ID);
                            $link         = get_the_permalink($p->ID);
                            
                            $thumbnail      = wp_get_attachment_image_src($images[0]['ID'], 'card_image');
                            $hoverThumbnail = wp_get_attachment_image_src($images[1]['ID'], 'card_image');
                    
                        ?>

                    
                        <div class="<?= $cards['class'] . '_card_container'; ?>">
                            <a href="<?= $link; ?>">

                                <div class="<?= $cards['class'] . '_card'; ?>">

                                    <?php if($images) : ?>

                                        <div class="<?= $cards['class'] . '_image_container'; ?>">

                                            <img src="<?= $thumbnail[0]; ?>" width="<?= $thumbnail[1]; ?>" height="<?= $thumbnail; ?>" data-alt-src="<?= $hoverThumbnail[0]; ?>"/>

                                        </div>

                                        <div class="<?= $cards['class'] . '_card_header'; ?>">
                                    
                                            <?php if($title) : ?>
                                                <h4 class="<?= $cards['class'] . '_card_title'; ?>">
                                                    <?= $title; ?>
                                                </h4>   
                                            <?php endif; ?>

                                        </div>
                                
                                    <?php endif; ?>

                                    <?php if($price) : ?>
                                        <span class="<?= $cards['class'] . '_card_price'; ?>">
                                            <?= '$' .$price; ?>
                                        </span> 
                                    <?php endif;?>

                                </div>
                            </a>

                        </div>
                    
                    <?php endforeach; ?>

                <?php endif; ?>

            <?php endwhile; ?>

        <?php endif; ?>

    </div>

</section>

                