$(document).ready(function () {       
    $('.slider_wrapper').each(function (index, sliderWrap) {
        var $main_banner = $(sliderWrap).find('.main_banner');    
        var $featured_products = $(sliderWrap).find('.featured_products');  

        $main_banner.slick({
            infinite: true,
            autoplay: true,
            dots: false,
            arrows: false,
            cssEase: 'linear',
            slidesToShow: 1,
            slidesToScroll: 1,            
        });

        $featured_products.slick({
            infinite: true,
            autoplay: true,
            dots: false,
            arrows: false,
            cssEase: 'linear',
            slidesToShow: 3,
            slidesToScroll: 1,            
        });
    }); 
});