jQuery( document ).ready(function($) {

    //Function Calls===========================
    dropdownMenuOpen();

    //Function Definitions========================
    function dropdownMenuOpen() {

        topLevel = $('.menu-item-has-children ');

        topLevel.on('click', function(event) {

            let target = event.target;

           if(target.tagName === "A") {
               target = target.parentNode;
               $(target).toggleClass('is-active');
               dropNav = $(target).find('.navigation_drop-nav');
               dropNav.toggleClass('is-open');
           }



        });       
    }

    $('.hero_container').slick({
        adaptiveHeight: true,
        arrows: true,
        dots: true
    });
    
});