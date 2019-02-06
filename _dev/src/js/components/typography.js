var typography = {

    bodyWidth: jQuery('body').width(),

    windowWidth: window.outerWidth,

    fullAlignedImage: jQuery('.wp-block-image.alignfull, .wp-block-gallery.alignfull'),

    init: function() {
        let scrollBarWidth = this.windowWidth - this.bodyWidth;
        if(scrollBarWidth && this.fullAlignedImage.length){
            let margin = '24px calc(-50vw + 50% - 8.5px)';
            this.fullAlignedImage.css(
                'margin',
                margin
            );
        }
    }
}

module.exports = typography;
