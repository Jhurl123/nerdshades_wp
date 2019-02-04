jQuery( document ).ready(function($) {

    //Function Calls===========================
    dropdownMenuOpen();

    //Function Definitions========================
    function dropdownMenuOpen() {

        topLevel = $('.menu-item-has-children ');

        topLevel.on('click', function(event) {

            topLevel.css('background-color', '#dedede');

            let target = event.target;

           if(target.tagName === "A") {
               target = target.parentNode;
           }

           dropNav = $(target).find('.navigation_drop-nav');
           dropNav.toggleClass('is-open');

        });       
    }

    $('.hero_container').slick({
        adaptiveHeight: true,
        arrows: true,
        dots: true
    });
    
});