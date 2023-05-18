$(document).ready(function () {       
    $('.slider_wrapper').each(function (index, sliderWrap) {
      var $main_banner = $(sliderWrap).find('.main_banner');    

        $main_banner.slick({
            infinite: true,
            autoplay: true,
            dots: true,
            arrows: false,
            cssEase: 'linear',
            slidesToShow: 1,
            slidesToScroll: 1,            
        });
    }); 
});