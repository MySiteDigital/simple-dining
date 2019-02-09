var menuNav = {

    menuContainer: jQuery('.menu-container'),

    init: function() {
        if(this.menuContainer.length){
            this.buttonListener();
        }
    },

    buttonListener: function() {
        console.log('sdfdsf');
        menuNav.menuContainer.on(
            'click',
            '.menu-section-heading button',
            function(){
                jQuery(this).toggleClass('open');
                jQuery(this).parent().next('.menu-section').slideToggle();
            }
        );
    }
}

module.exports = menuNav;
