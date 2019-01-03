var mobileNav = {

    header: jQuery('#header'),

    mainNav: jQuery('#main-nav'),

    clonedNav: '',

    mobileIcons: jQuery('#mobile-icons'),

    openButton: jQuery('#open-menu'),

    logoWidth: jQuery('.custom-logo-link').width(),

    callNowButtonWidth: jQuery('.call-now-button').width(),

    init: function() {
        mobileNav.cloneNav();
        mobileNav.toggleMainNavDisplay();

        jQuery(window).resize(
            function(){
                mobileNav.toggleMainNavDisplay();
            }
        );
    },

    cloneNav: function(){
        mobileNav.clonedNav = mobileNav.mainNav.clone();
        mobileNav.clonedNav.attr('id', 'cloned-nav');
        jQuery('body').append(mobileNav.clonedNav);
    },

    toggleMainNavDisplay: function(){
        let headerWidth = mobileNav.header.width();
        let mainNavWidth = mobileNav.clonedNav.width();
        if(headerWidth <= (mobileNav.logoWidth + mainNavWidth)){
            mobileNav.mainNav.hide();
            mobileNav.mobileIcons.show();
            mobileNav.openButton.css('display', 'block');
        }
        else {
            mobileNav.mainNav.show();
            mobileNav.mobileIcons.hide();
            mobileNav.openButton.css('display', 'none');
        }
    }
}

module.exports = mobileNav;
