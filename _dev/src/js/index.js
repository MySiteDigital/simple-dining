import '../scss/build.scss';

import mobileNav from './components/mobile-nav';
import typography from './components/typography';


;(
    function($) {

        jQuery(document).ready(
            function() {
                typography.init();
            }
        );

        jQuery(window).on(
            'load',
            function() {
                mobileNav.init();
            }
        );

    }
)(jQuery);
