var nav = {

    siteHeader: jQuery('#site-header'),

    hiddenMenu: jQuery('#hidden-menu'),

    mainNav: jQuery('#main-nav'),

    logo: jQuery('.custom-logo-link'),

    callNowButton: jQuery('.call-now-button'),

    callNowButtonWidth: jQuery('.call-now-button').outerWidth(true),

    logoWidth: 0,

    mainNavWidth: 0,

    callNowButtonWidth: 0,

    mobileIcons: jQuery('.nav-icons'),

    openButton: jQuery('#open-menu'),

    closeButton: jQuery('#close-menu'),

    init: function() {
        nav.setWidthProperties();
        nav.toggleMainNavDisplay();
        nav.activateListeners();
    },

    setWidthProperties: function(){
        nav.mainNav.show();
        nav.mainNavWidth = nav.mainNav.outerWidth();
        nav.mainNav.hide();

        nav.mainCallNowButtonWidth = nav.callNowButton.outerWidth(true);
        nav.logoWidth = nav.logo.outerWidth(true);
    },

    toggleMainNavDisplay: function(){
        let availableNavWidth = nav.siteHeader.width() - (nav.logoWidth + nav.mainCallNowButtonWidth);
        if (availableNavWidth <= nav.mainNavWidth){
            nav.siteHeader.addClass('hidden-menu');
            nav.hiddenMenu.addClass('hidden-menu');
            nav.callNowButton.removeClass('full-size');
            nav.mainNav.hide();
            nav.mobileIcons.show();
        }
        else {
            nav.siteHeader.removeClass('hidden-menu');
            nav.hiddenMenu.removeClass('hidden-menu');
            nav.callNowButton.addClass('full-size');
            nav.mainNav.show();
            nav.mobileIcons.hide();
        }

        window.setTimeout(
            function () {
                nav.siteHeader.addClass('visible');
                nav.hiddenMenu.addClass('visible');
            }, 
            1000
        );
    },

    activateListeners: function(){
        jQuery(window).resize(
            function(){
                nav.toggleMainNavDisplay();
            }
        );

        nav.openButton.on(
            'click',
            function(e){
                nav.hiddenMenu.animate(
                    {
                        left: 0
                    },
                    300
                );
            }
        );

        nav.closeButton.on(
            'click',
            function(e){
                nav.hiddenMenu.animate(
                    {
                        left: '-100%'
                    },
                    300
                );
            }
        );
    }
}

module.exports = nav;
