import '../scss/build.scss';

import navigation from './components/navigation';
import svg4everybody from 'svg4everybody/dist/svg4everybody';

svg4everybody();

;(
    function($) {

        jQuery(document).ready(
            function() {
                navigation.init();
                console.log('ready');
                
            }
        );

        jQuery(window).on(
            'load',
            function() {

            }
        );

    }
)(jQuery);
