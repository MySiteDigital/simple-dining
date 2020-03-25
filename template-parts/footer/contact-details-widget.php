<?php 

extract( $instance );

use MySiteDigital\Assets\SVG;

echo '<dl>';

if( $address ){
    $output = nl2br( $address );
    if( $address_link ){
        $output = '
            <a href="' . $address_link . '" target="_blank">
                ' . $output . '
            </a>';
    }
    
    echo '
        <dt>
            ' . SVG::icon( 'location', '', '0 0 20 20', false ) . '
        </dt>
        <dd>
            ' . $output . '
        </dd>';    
}

if( $phone_number || $phone_link ){
    $phone_number = $phone_number ? $phone_number : $phone_link;
    echo '
        <dt>
            ' . SVG::icon( 'phone', 'phone-icon', '0 0 20 20', false ) . '
        </dt>
        <dd>
            <a href="tel:' . $phone_link . '">
                ' . $phone_number . '
            </a>
        </dd>';  
}

if( $email ){
    echo '
        <dt>
            ' . SVG::icon( 'mail', '', '0 0 24 24', false ) . '
        </dt>
        <dd>
            <a href="mailto:' . $email . '">
                ' . $email . '
            </a>
        </dd>';  
}

echo '</dl>';