var nav = {

    siteHeader: jQuery('#site-header'),

    hiddenMenu: jQuery('#hidden-menu'),

    mainNav: jQuery('#main-nav'),

    clonedNav: '',

    mobileIcons: jQuery('.mobile-icons'),

    openButton: jQuery('#open-menu'),

    closeButton: jQuery('#close-menu'),

    callNowButton: jQuery('.call-now-button'),

    clonedCallNowButton: '',

    logoWidth: jQuery('.custom-logo-link').width(),

    callNowButtonWidth: jQuery('.call-now-button').width(),

    mainNavWidth: 0,

    init: function() {
        nav.getMainNavWidth();
        nav.toggleMainNavDisplay();
        nav.activateListeners();
    },

    getMainNavWidth: function(){
        nav.mainNav.show();
        nav.mainNavWidth = nav.mainNav.outerWidth();
        nav.mainNav.hide();
    },

    toggleMainNavDisplay: function(){
        let availableNavWidth = nav.siteHeader.width() - (nav.logoWidth + nav.callNowButtonWidth);
        console.log(availableNavWidth);
        console.log(nav.mainNavWidth);
        
        if (availableNavWidth <= nav.mainNavWidth){
            nav.siteHeader.addClass('hidden-menu');
            nav.hiddenMenu.addClass('hidden-menu');
            nav.callNowButton.removeClass('full-size');
            nav.mainNav.hide();
            // nav.mobileIcons.show();
            // nav.openButton.css('display', 'block');
        }
        else {
            nav.siteHeader.removeClass('hidden-menu');
            nav.hiddenMenu.removeClass('hidden-menu');
            nav.callNowButton.addClass('full-size');
            nav.mainNav.show();
            // nav.mainNav.css('visibility', 'visible');
            // nav.mobileIcons.hide();
            // nav.openButton.css('display', 'none');
        }

        window.setTimeout(
            function () {
                nav.siteHeader.addClass('visible');
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
