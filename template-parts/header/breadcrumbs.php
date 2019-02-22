<?php
/*
* TEmplate part to display the breadcrumbs on products pages
*
*/
?>
<div class="breadcrumb_container">
    <ul class="breadcrumb_list"><!-- whitespace:preserve? -->
        <li><a href="<?php echo home_url(); ?>">Home</a></li>
        <span class="breadcrumb_separator">  » </span>

        <?php if(is_array($crumbs)) :?>
            <?php foreach($crumbs as $crumb ) : ?>
                <li>
                    <a href="#"> 
                        <?php echo $crumb; ?> 
                    </a>
                </li>
                <span class="breadcrumb_separator">  » </span>

            <?php endforeach; ?>
        <?php else :?>
            <li>
                <a href="#"> 
                    <?php echo $crumbs; ?> 
                </a>
            </li>

        <?php endif; ?>
        
    </ul>

</div>