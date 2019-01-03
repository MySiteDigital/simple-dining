import '../scss/build.scss';

import mobileNav from './components/mobile-nav';


;(
    function($) {

        jQuery(document).ready(
            function() {

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
