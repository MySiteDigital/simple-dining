import menuMasonry from './menu-masonry';

var menuNav = {

    menuContainer: jQuery('.menu-container'),

    init: function() {
        if(this.menuContainer.length){
            this.buttonListener();
        }
    },

    buttonListener: function() {
        menuNav.menuContainer.on(
            'click',
            '.menu-section-heading button',
            function(){
                jQuery(this).toggleClass('open');
                jQuery(this).parent().next('.menu-section').slideToggle();
                menuMasonry.activateMasonry();
            }
        );
    }
}

module.exports = menuNav;
