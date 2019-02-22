<?php
wp_enqueue_script('isotope');
/*
*
* The Archive page to display all of the sunglasses post type
*
*/


get_header();




?>

<div class="archive_container">

    <?php 
        do_action('breadcrumb_filter', '');
    ?>

<div class="row">
    <div class="columns large-2">
        <div class="archive_sidebar">
            <div class="archive_sidebar_header">
                <h2 class="archive_sidebar_head">
                    Filter Products
                </h2>
            </div>

            <div class="archive_sidebar_body">
                <ul class="archive-sidebar_post_type">
                    <?php 
                        $args = array(
                            'public'   => true,
                            '_builtin' => false,
                            );
                        $types = get_post_types($args); 
                    
                    //Will need to add some content to add the types here and a style class to shift text right
                    foreach($types as $type) : ?>
                        <li class="archive-sidebar_list_type"> <?php echo ucFirst($type); ?> </li>
                    <?php endforeach; ?>
        
                </ul>
            </div>
        </div>
    </div>

    <div class="columns large-10">
        <div class="archive_products_container">


        </div>

    </div>



</div>

</div>






<?php get_footer(); ?>