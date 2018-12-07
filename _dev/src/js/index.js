import '../scss/build.scss';

;(function($)
    {
        $(document).ready(
            function() {
                theme.init();
            }
        );

        var theme = {
            init: function () {
                console.log('Hello Kimi!');
            }
        }
    }
)(jQuery);
