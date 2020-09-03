$('.productshow__modal--carousel__slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows:true,
    autoplay: true,
    lazyLoad: 'ondemand',
    autoplaySpeed: 2000,
    infinite: true,
    lazyLoad: 'ondemand',
    prevArrow:'<button type="button" class="slick-prev"><i class="fas fa-chevron-circle-left"></i></button>',
    nextArrow:'<button type="button" class="slick-next"><i class="fas fa-chevron-circle-right"></i></button>',
});
$('.productshow__indicator').slick({
    infinite: true,
    asNavFor:'.productshow__indicator--inner',
    lazyLoad: 'ondemand',
    arrows:false,
    focusOnSelect: true,
    autoplay: true,
    autoplaySpeed: 3000,
    vertical:true,
    verticalSwiping:true,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive:
    [
        {
            breakpoint: 700,
            settings: {
                slidesToShow: 0,
                slidesToScroll: 0,
            },
        },
    ]
});
$('.productshow__indicator--inner').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    lazyLoad: 'ondemand',
    prevArrow:'<button type="button" class="slick-prev"><i class="fas fa-chevron-circle-left"></i></button>',
    nextArrow:'<button type="button" class="slick-next"><i class="fas fa-chevron-circle-right"></i></button>',
    arrows:true,
    asNavFor:'.productshow__indicator',
    responsive:
    [
        {
            breakpoint: 700,
            settings: {
                asNavFor:'',
            },
        },
    ],

});

$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 4
        }
    }
})
$('.owl-carousel-2').slick({
    loop: true,
    margin: 10,
    lazyLoad: 'ondemand',
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint:0,
            settings: {
                slidesToShow: 1
            }
        },
        {
            breakpoint:600,
            settings: {
                slidesToShow: 3
            },
        },
        {
            breakpoint:1000,
            settings: {
                slidesToShow: 5
            }
        }
    ]
})

$('.index__producthot--slick').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows:true,
    autoplay: true,
    autoplaySpeed: 2000,
    infinite: true,
    lazyLoad: 'ondemand',
    prevArrow:'<button type="button" class="slick-prev"><i class="fas fa-chevron-circle-left"></i></button>',
    nextArrow:'<button type="button" class="slick-next"><i class="fas fa-chevron-circle-right"></i></button>',
    responsive:[
        {
            breakpoint:1200,
            settings:{
                slidesToShow: 3,
                arrows:true
            }
        },
        {
            breakpoint:1000,
            settings:{
                slidesToShow: 2,
                arrows:true
            }
        },
        {
            breakpoint:770,
            settings:{
                slidesToShow: 1,
                arrows:true
            }
        },

    ]
});
$('.index__productnew--slick').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows:true,
    autoplay: true,
    autoplaySpeed: 2000,
    infinite: true,
    lazyLoad: 'ondemand',
    prevArrow:'<button type="button" class="slick-prev"><i class="fas fa-chevron-circle-left"></i></button>',
    nextArrow:'<button type="button" class="slick-next"><i class="fas fa-chevron-circle-right"></i></button>',
    responsive:[
        {
            breakpoint:1200,
            settings:{
                slidesToShow: 3,
                arrows:true
            }
        },
        {
            breakpoint:1000,
            settings:{
                slidesToShow: 2,
                arrows:true
            }
        },
        {
            breakpoint:770,
            settings:{
                slidesToShow: 1,
                arrows:true
            }
        },

    ]
});
