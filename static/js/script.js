function openModal() {
    document.getElementById("header_search_modal").classList.add("active");
}

function closeModal() {
    document.getElementById("header_search_modal").classList.remove("active");
}

function openCartPanel() {
    document.getElementById("mini_cart_panel").classList.add("active");
}

function closeCartPanel() {
    document.getElementById("mini_cart_panel").classList.remove("active");
}


jQuery(document).ready(function(){
    jQuery('.products').each(function(){  
        var highestBox = 0;
        jQuery(this).find('.woocommerce-loop-product__title').each(function(){
            if(jQuery(this).height() > highestBox){  
                highestBox = jQuery(this).height();  
            }
        });
        jQuery(this).find('.woocommerce-loop-product__title').height(highestBox);
    });
});
