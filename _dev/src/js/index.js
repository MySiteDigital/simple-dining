import '../scss/build.scss';

import menuMasonry from './components/menu-masonry';
import menuNav from './components/menu-navigation';
import mobileNav from './components/mobile-nav';
import typography from './components/typography';


;(
    function($) {

        jQuery(document).ready(
            function() {
                typography.init();
                menuNav.init();
            }
        );

        jQuery(window).on(
            'load',
            function() {
                menuMasonry.init();
                mobileNav.init();
            }
        );

    }
)(jQuery);
