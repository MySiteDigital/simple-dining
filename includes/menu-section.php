<div class="wp-block-columns has-2-columns">
    <button>
        <h2><?php echo $section_title; ?></h2>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24">
            <use xlink:href="<?php icons(); ?>#down"/>
        </svg>
    </button>
</div>
<div class="wp-block-columns has-2-columns">
    <?php
        $count = 0;
        foreach( $section_items as $item_title => $item_values  ){
            if( $count % 2 == 0 && $count > 0 ){
                echo '</div>';
                echo '<div class="wp-block-columns has-2-columns">';
            }
            $extra_class = ' item-' . ($count % 4 + 1);
            ?>
            <div class="wp-block-column">
                <figure class="wp-block-dining-dashboard-menu-item<?php echo $extra_class; ?>">
                    <div class="img" style="background-image: url(/wp-content/uploads/2019/02/<?php echo $item_values['img']; ?>);">
                        &nbsp;
                    </div>
                    <div class="details">
                        <h3><?php echo $item_title; ?></h3>
                        <p><?php echo $item_values['desc']; ?></p>
                        <div class="meta">
                            <?php
                                 if( isset($item_values['diet']) ){
                                     foreach( $item_values['diet'] as $dietary_requirement ) {
                                         $icon = icons( false ) . '#' . $dietary_requirement;
                                         $title = ucwords( str_replace( '-', ' ', $dietary_requirement ) );
                                         ?>
                                         <span title="<?php echo $title; ?>">
                                             <span class="screen-reader-text">
                                                 <?php echo $title; ?>
                                             </span>
                                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24">
                                                 <use xlink:href="<?php echo $icon; ?>"/>
                                             </svg>
                                         </span>
                                         <?php
                                     }
                                 }
                            ?>
                            <span class="price"><?php echo $item_values['price']; ?></span>
                        </div>
                    </div>
                </figure>
            </div>
            <?php
            $count++;
        }
    ?>

</div>
