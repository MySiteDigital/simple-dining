var formSubmission = {

    form: jQuery('form'),

    response: jQuery('.wpcf7-response-output'),

    init: function() {
        if(this.form.length){
            this.submissionListener();
        }
    },

    submissionListener: function() {
        this.form.on(
            'submit',
            function(){
                var interval = setInterval(
                    function(){
                        if(formSubmission.response.text()){
                            let scroll = formSubmission.response.offset().top + formSubmission.response.outerHeight(true);
                            jQuery('html, body').animate(
                                {
                                    scrollTop: scroll
                                },
                                500
                            );
                            clearInterval(interval);
                        }
                    },
                    100
                );
            }
        );
    }
}

module.exports = formSubmission;
