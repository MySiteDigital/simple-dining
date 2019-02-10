import '../scss/build.scss';

import formSubmission from './components/form-submission';
import menuMasonry from './components/menu-masonry';
import menuNav from './components/menu-navigation';
import mobileNav from './components/mobile-nav';
import typography from './components/typography';
import svg4everybody from 'svg4everybody/dist/svg4everybody';

svg4everybody();

;(
    function($) {

        jQuery(document).ready(
            function() {
                typography.init();
                formSubmission.init();
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
