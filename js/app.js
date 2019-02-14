jQuery( document ).ready(function($) {

    //Function Calls===========================
    dropdownMenuOpen();
    productCardHover();
    mobileMenuToggle();
    buttonHoverHelper();

    //Function Definitions========================
    function dropdownMenuOpen() {

        topLevel = $('.menu-item-has-children ');

        topLevel.on('click', function(e) {

            let target = e.target;

           if(target.tagName === "A") {
               target = target.parentNode;
               $(target).toggleClass('is-active');
               dropNav = $(target).find('.navigation_drop-nav');
               dropNav.toggleClass('is-open');
           }

        });       
    }

    function productCardHover() {
        $('.product_cards_image_container').hover(function(e) {
            var cardImage = $(this).find('img');
                cardSrc   = cardImage.attr('src');
                hoverSrc  = cardImage.data('alt-src');
                cardImage.attr('src', hoverSrc);
                cardImage.data('alt-src', cardSrc);
        },
        function() {
            var cardImage = $(this).find('img');
                cardSrc   = cardImage.attr('src');

                hoverSrc  = cardImage.data('alt-src');
                cardImage.attr('src', hoverSrc);
                cardImage.data('alt-src', cardSrc);
        });
    }

    function  mobileMenuToggle() {

        $('#nav-toggle').on('click', function() {
            $(this).toggleClass('active');
        });
    }

    $('.product_cards_card_row').slick({
      
        adaptiveHeight: true,
        dots: true,
        infinite: true,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1000,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },

            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            
        ]

    });

    function buttonHoverHelper()  {
        var button = $('.slide_pieces_button');
        var background = button.css('border-color');

        button.hover(function(e) {
            $(this).css({'color' : 'rgba(0,0,0,0.8)',
                         'background': background});
        },
        function() {
           
            $(this).css({'color' : background,
                        'background' : 'none'});
    
        });
    }
    
});

//iife
(function() {

    //Slide pieces object constructor
    function Slide_piece(element, height, index) {

        this.element = element;
        this.height = height;
        this.index = index;
           
    }

    Slide_piece.prototype = {
        //Prototype method that will handle the actual sliding of the pieces
        slide: function() {

            if(this.element.classList.contains('left')) {

                this.element.classList.add('left-open');
            }
            else {
                this.element.classList.add('right-open');
            }

        },

        destroy: function() {
            if( this.element.classList.contains('left-open')) {
                this.element.classList.remove('left-open');
            }
            else if (this.element.classList.contains('right-open')) {
                this.element.classList.remove('right-open');
            }
        }
    };

    function slide_pieces_init() {
       
        var pieces = document.querySelectorAll('.slide_pieces_slide');
            pieces = Array.prototype.slice.call(pieces);
            
            var slides = pieces.map((slide, idx, array) => {
    
                //applying classes to every other slide
                idx = idx+1;

                if(idx % 2) {
                    slide.classList.add('left');
                }
                else {
                    slide.classList.add('right');
                }
                idx = idx-1;

                height = slide.offsetTop;
                return new Slide_piece(slide, height, idx);
            });
            return slides;
    }

    var Slides = slide_pieces_init();
    scrollListener(Slides);

    function scrollListener(Slides) {

        var windowHeight = window.outerHeight;

        window.addEventListener('scroll', function() {

            scrollHeight = window.scrollY;

            switchHeight = scrollHeight + windowHeight;

            for(var i = 0; i < Slides.length; i++) {

                if(switchHeight >= Slides[i].height) {

                    Slides[i].slide();

                }
                else {
                    Slides[i].destroy();
                }
            }

        });

    }
    

})();