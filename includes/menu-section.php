<div class="wp-block-columns has-2-columns">
    <div class="wp-block-column">
        <h2><?php echo $section_title; ?></h2>
    </div>
    <div class="wp-block-column">
    </div>
</div>
<div class="wp-block-columns has-2-columns">
    <?php
        $count = 0;
        foreach( $section_items as $item_title => $item_values  ){
            if( $count % 2 == 0 && $count > 0 ){
                echo '</div>';
                echo '<div class="wp-block-columns has-2-columns">';
            }
            ?>
            <div class="wp-block-column">
                <figure class="wp-block-dining-dashboard-menu-item">
                    <header>
                        <h3><?php echo $item_title; ?></h3>
                        <span class="price"><?php echo $item_values['price']; ?></span>
                    </header>
                    <div class="description">
                        <img src="/wp-content/uploads/2019/02/<?php echo $item_values['img']; ?>">
                        <p><?php echo $item_values['desc']; ?></p>
                    </div>
                </figure>
            </div>
            <?php
            $count++;
        }
    ?>

</div>
