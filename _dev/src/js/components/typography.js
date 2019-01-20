var typography = {

    bodyWidth: jQuery('body').width(),

    windowWidth: jQuery(window).width(),

    fullAlignedImage: jQuery('.wp-block-image.alignfull'),

    init: function() {
        let scrollBarWidth = this.windowWidth - this.bodyWidth;
        if(scrollBarWidth && this.fullAlignedImage.length){
            let margin = '24px calc(-50vw + 50% - 9px)';
            this.fullAlignedImage.css(
                'margin',
                margin
            );
        }
    }
}

module.exports = typography;
