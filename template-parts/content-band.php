<?php
/* 
* Content Band template part
*
*/

$background_color = get_sub_field('content_band_background_color');
$text_color       = get_sub_field('content_band_color');
$headline         = get_sub_field('content_band_headline');
$content          = get_sub_field('content_band_content');

?>

<section class="content_band" style="background-color: <?= $background_color; ?>;">
    <div class="row">
        <div 
            class="content_band_container columns small-12" 
            style="color: <?= $text_color; ?>"
        >

            <?php if($headline) : ?>
                <h2 class="content_band_headline"><?= $headline; ?></h2>
            <?php endif; ?>

            <?php if($content) : ?>
                <?= $content; ?>
            <?php endif; ?>

        </div>  
    </div>
</section>
