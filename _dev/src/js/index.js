import '../scss/build.scss';

import alignmentAdjustor from './components/alignment-adjustor';
import formSubmission from './components/form-submission';
import navigation from './components/navigation';
import svg4everybody from 'svg4everybody/dist/svg4everybody';

svg4everybody();

;(
    function($) {

        jQuery(document).ready(
            function() {
                alignmentAdjustor.init();
                formSubmission.init();
                navigation.init();
            }
        );

        jQuery(window).on(
            'load',
            function() {
                
            }
        );

    }
)(jQuery);
