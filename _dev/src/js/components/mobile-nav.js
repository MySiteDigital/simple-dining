var mobileNav = {

    header: jQuery('#header'),

    hiddenMenu: jQuery('#hidden-menu'),

    mainNav: jQuery('#main-nav'),

    clonedNav: '',

    mobileIcons: jQuery('.mobile-icons'),

    openButton: jQuery('#open-menu'),

    closeButton: jQuery('#close-menu'),

    callNowButton: jQuery('.call-now-button'),

    clonedCallNowButton: '',

    logoWidth: jQuery('.custom-logo-link').width(),

    init: function() {
        mobileNav.cloneNav();
        mobileNav.toggleMainNavDisplay();
        mobileNav.activateListeners();
    },

    cloneNav: function(){
        mobileNav.clonedNav = mobileNav.mainNav.clone();
        mobileNav.clonedCallNowButton = mobileNav.callNowButton.clone();
        mobileNav.clonedNav.attr('id', 'cloned-nav');
        mobileNav.clonedCallNowButton.attr('id', 'cloned-cta');
        mobileNav.clonedCallNowButton.css('width', mobileNav.callNowButton.outerWidth());
        jQuery('body').append(mobileNav.clonedNav);
        jQuery('body').append(mobileNav.clonedCallNowButton);
    },

    toggleMainNavDisplay: function(){
        let headerWidth = mobileNav.header.width();
        let mainNavWidth = mobileNav.clonedNav.width();
        let callNowButtonWidth = mobileNav.clonedCallNowButton.outerWidth(true);
        if(headerWidth <= (mobileNav.logoWidth + mainNavWidth + callNowButtonWidth)){
            mobileNav.header.addClass('hidden-menu');
            mobileNav.hiddenMenu.addClass('hidden-menu');
            mobileNav.callNowButton.removeClass('full-size');
            mobileNav.mainNav.hide();
            mobileNav.mobileIcons.show();
            mobileNav.openButton.css('display', 'block');
        }
        else {
            mobileNav.header.removeClass('hidden-menu');
            mobileNav.hiddenMenu.removeClass('hidden-menu');
            mobileNav.callNowButton.addClass('full-size');
            mobileNav.mainNav.show();
            mobileNav.mainNav.css('visibility', 'visible');
            mobileNav.mobileIcons.hide();
            mobileNav.openButton.css('display', 'none');
        }
    },

    activateListeners: function(){
        jQuery(window).resize(
            function(){
                mobileNav.toggleMainNavDisplay();
            }
        );

        mobileNav.openButton.on(
            'click',
            function(e){
                mobileNav.hiddenMenu.animate(
                    {
                        left: 0
                    },
                    500
                );
            }
        );

        mobileNav.closeButton.on(
            'click',
            function(e){
                mobileNav.hiddenMenu.animate(
                    {
                        left: '-100%'
                    },
                    500
                );
            }
        );
    }
}

module.exports = mobileNav;
