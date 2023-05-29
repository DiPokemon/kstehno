$(document).ready(function () {       
    $('.slider_wrapper').each(function (index, sliderWrap) {
        var $main_banner = $(sliderWrap).find('.main_banner');    
        var $featured_products = $(sliderWrap).find('.featured_products');
        var $advantages = $(sliderWrap).find('.advantages');
        var $testimonials = $(sliderWrap).find('.testimonials');

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

        $advantages.slick({
            infinite: true,
            autoplay: true,
            dots: false,
            arrows: false,
            cssEase: 'linear',
            slidesToShow: 4,
            slidesToScroll: 1,
        });

        $testimonials.slick({
            autoplay: true,
            arrows: false,
            dots: false,
            slidesToShow: 3,
            slidesToScroll: 1, 
            centerMode: true,
            //draggable: true,
            infinite: true,
            pauseOnHover: false,
            // swipe: true,
            // touchMove: true,
            vertical: true,
            speed: 1000,
            autoplaySpeed: 3000,
            useTransform: true,
            //cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
            cssEase: 'linear',
            adaptiveHeight: true,
        });
    }); 
});