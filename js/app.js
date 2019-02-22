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

    if($('body').is('.page-template-template-page-builder')) {
        console.log("dsfsd");
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
    }
    

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

    //Slide pieces object constructor
    function Slide_piece(element, height, index) {

        this.element = element;
        this.height  = height;
        this.index   = index;
           
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

                var getElemDistance = function ( elem ) {
                    var location = 0;
                    if (elem.offsetParent) {
                        do {
                            location += elem.offsetTop;
                            elem = elem.offsetParent;
                        } while (elem);
                    }
                    return location >= 0 ? location : 0;
                };
                
                height = getElemDistance( slide );
                console.log(height);
                return new Slide_piece(slide, height, idx);
            });
            return slides;
    }

    var Slides = slide_pieces_init();
    var bodyID = document.getElementById('body');
    
    if(bodyID.classList.contains('page-template-template-page-builder')) {
        scrollListener(Slides);
    }
    
    //the position of the window on load
    function windowPosLoad() {
        loadPosition = window.scrollY;
        return loadPosition;
    }

    //function to get window height that gets called on resize
    function windowSize(windowHeight) {
        var windowHeight = window.innerHeight;
        return windowHeight;
    }


    function scrollListener(Slides) {

        window.addEventListener('resize', function() {
            windowSize(window.outerHeight);
        });

        //Event listener tocall the functions to get the size and postion on load
        window.addEventListener('load', function() {
        
            var startPosition = windowPosLoad();
            var windowHeight  = windowSize();
            for(var i = 0; i < Slides.length; i++) {
            if((startPosition +windowHeight) >= Slides[0].height) {
                Slides[i].slide();
            } 
        }
        });

        //window scroll event listener to trigger the slidein/out functionality 
        window.addEventListener('scroll', function() {
            
            //height of container section from top of page
            var piecesSection = document.querySelector('.slide_pieces_section').offsetTop;
            var scrollHeight  = window.scrollY;
            var windowHeight  = windowSize();
            windowHeight      = scrollHeight + windowHeight;
            console.log(windowHeight);

            for(var i = 0; i < Slides.length; i++) {
                console.log(Slides[i].element.clientHeight);
                if((windowHeight + (Slides[i].element.clientHeight * 2))  >= Slides[i].height) {
                    Slides[i].slide();
                    
                }
                if(windowHeight <= piecesSection){
                        Slides[i].destroy();
                }
                
            }
        });

    }

    if(document.body.classList.contains('page-template-template-page-builder')) {
        function tileHover() {
            let tileRow = document.querySelector('.tile-row_container');
            
        
            tileRow.addEventListener('mouseover', function(e) {
                
                if(e.target.classList.contains('tile-row_tile')) {
                    let subHead = e.target.querySelector('.tile-row_sub_title');
                    subHead.classList.add('tile-row_sub_title-open');
                }
            });

            tileRow.addEventListener('mouseout', function(e) {
                e.stopPropagation();
                e.stopImmediatePropagation();
                let tileText = e.target.querySelector('.tile-row_text_container');
                let tileHead = e.target.querySelector('.tile-row_title');
                let subHead  = e.target.querySelector('.tile-row_sub_title-open');
            
                if(e.target.classList.contains('tile-row_tile') && e.relatedTarget !==  tileText && e.relatedTarget !== tileHead
                && e.relatedTarget !== subHead) {
                    
                    subHead.classList.remove('tile-row_sub_title-open');
                }
                
            });
        }
        tileHover();
    }