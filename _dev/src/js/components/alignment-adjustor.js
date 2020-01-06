var alignmentAdjustor = {

    fullWidthBlocks: jQuery('.alignfull'),

    init: function() {
        let scrollBarWidth = alignmentAdjustor.getScrollBarWidth();
        
        if (scrollBarWidth && alignmentAdjustor.fullWidthBlocks.length){
            let margin = '24px calc(-50vw + 50% - ' + (scrollBarWidth / 2) + 'px)';
            
            alignmentAdjustor.fullWidthBlocks.css(
                'margin',
                margin
            );
        }
    },

 

    getScrollBarWidth: function() {
        let testDiv = jQuery('<div>').css(
            { 
                visibility: 'hidden', 
                width: 100, 
                overflow: 'scroll' 
            }
        ).appendTo('body');
        
        let widthWithScroll = jQuery('<div>').css(
            { 
                width: '100%' 
            }
        ).appendTo(testDiv).outerWidth();
        
        testDiv.remove();
        
        return 100 - widthWithScroll;
    }
}

module.exports = alignmentAdjustor;
