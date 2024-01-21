function openModal() {
    document.getElementById("header_search_modal").classList.add("active");
}

function closeModal() {
    document.getElementById("header_search_modal").classList.remove("active");
}

function openModalMobile() {
    document.getElementById("header_search_modal_mob").classList.add("active");
}

function closeModalMobile() {
    document.getElementById("header_search_modal_mob").classList.remove("active");
}

function openCartPanel() {
    document.getElementById("mini_cart_panel").classList.add("active");
}

function closeCartPanel() {
    document.getElementById("mini_cart_panel").classList.remove("active");
}


function openCartPanelMobile() {
    document.getElementById("mini_cart_panel_mob").classList.add("active");
}

function closeCartPanelMobile() {
    document.getElementById("mini_cart_panel_mob").classList.remove("active");
}

jQuery(document).ready(function() {
    jQuery('.products').each(function() {
        var highestBox = 0;
        jQuery(this).find('.woocommerce-loop-product__title').each(function() {
            if (jQuery(this).height() > highestBox) {
                highestBox = jQuery(this).height();
            }
        });
        jQuery(this).find('.woocommerce-loop-product__title').height(highestBox);
    });
});




jQuery(document).ready(function() {
    jQuery('.featured_products .slick-track').each(function() {
        var highestBox = 0;
        jQuery(this).find('.featured_product_wrapper').each(function() {
            if (jQuery(this).height() > highestBox) {
                highestBox = jQuery(this).height();
            }
        });
        jQuery(this).find('.featured_product_wrapper').height(highestBox);
    });
});


document.addEventListener('DOMContentLoaded', function() {
    document.body.addEventListener('click', function(event) {
        if (event.target.classList.contains('facetwp-page')) {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });
});

jQuery(document).ready(function ($) {
    $('form.checkout').on('checkout_place_order', function() {
        // Получаем текущий текст кнопки "Place Order"
        var currentButtonText = $('#place_order').text();

        // Заменяем текст кнопки на GIF-изображение + текущий текст
        $('#place_order').html('<img src="/wp-content/themes/kstehno/static/preloader.gif" alt="Loading" /> ' + currentButtonText);
    });
});