var menuMasonry = {

    menuContainer: jQuery('.menu-container'),

    columns: jQuery('.wp-block-column'),

    menuSectionClass: 'menu-section',

    menuItemsClass: 'wp-block-dining-dashboard-menu-item',

    menuItems: jQuery('.wp-block-dining-dashboard-menu-item'),

    init: function() {
        if(this.menuContainer.length){
            this.setupMenuSections();
            this.windowResizeListener();
            this.activateMasonry();
        }
    },

    activateMasonry: function() {
        //reset top margin on menu items
        this.menuItems.css('marginTop', 0);

        if(! this.isSingleColumn()){

            let columnMargin = parseInt(this.columns.css('marginBottom'));

            jQuery('.' + menuMasonry.menuSectionClass).each(
                function(i, el){
                    let previousItem = {};
                    //right column
                    let currentItem = {};
                    jQuery(el).find('.' + menuMasonry.menuItemsClass).each(
                        function(i, el){
                            if(i % 2 == true){
                                if(! jQuery.isEmptyObject(previousItem)){
                                    currentItem = jQuery(el);
                                    let prevBottom = previousItem.offset().top + previousItem.outerHeight();
                                    let currentTop = currentItem.offset().top;
                                    let distance = currentTop - prevBottom - columnMargin;
                                    currentItem.css('marginTop', -distance);
                                    previousItem = currentItem;
                                }
                                else {
                                    previousItem = jQuery(el);
                                }
                            }
                        }
                    );
                    //left column
                    previousItem = {};
                    currentItem = {};
                    jQuery(el).find('.' + menuMasonry.menuItemsClass).each(
                        function(i, el){
                            if((i % 2) == false){
                                if(! jQuery.isEmptyObject(previousItem)){
                                    currentItem = jQuery(el);
                                    let prevBottom = previousItem.offset().top + previousItem.outerHeight();
                                    let currentTop = currentItem.offset().top;
                                    let distance = currentTop - prevBottom - columnMargin;
                                    currentItem.css('marginTop', -distance);
                                    previousItem = currentItem;
                                }
                                else {
                                    previousItem = jQuery(el);
                                }
                            }
                        }
                    );
                }
            );
        }
    },

    windowResizeListener: function() {
        jQuery(window).on(
            'resize',
            function(){
                menuMasonry.activateMasonry()
            }
        );
    },

    setupMenuSections: function() {
        let menuSections = jQuery('.wp-block-columns').find('h2').closest('.wp-block-columns');
        menuSections.addClass('menu-section-heading');

        menuSections.each(
            function(i, el){
                 let contents = jQuery(el).nextUntil('.menu-section-heading');
                 let section = jQuery('<section>').insertAfter(el);
                 section.addClass(menuMasonry.menuSectionClass);
                 section.append(contents);
            }
        );
    },

    isSingleColumn: function() {
        return this.columns.width() == this.columns.parent().width();
    }
}

module.exports = menuMasonry;
