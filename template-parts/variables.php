<?php
  	
  $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
  $currenturl = get_permalink();

  $head_code = carbon_get_theme_option( 'head_code' );
  $footer_code = carbon_get_theme_option( 'footer_code' );
  $htmlsitemap_link = carbon_get_theme_option( 'html_sitemap_link' );
  $htmlsitemap_text = carbon_get_theme_option( 'html_sitemap_text' );
  $policy_link = carbon_get_theme_option( 'policy_privacy_link' );
  $policy_text = carbon_get_theme_option( 'policy_privacy_text' );
  $copyright = carbon_get_theme_option( 'copyright' );
  $title = carbon_get_theme_option( 'main_title' );
  $catalog_icon = carbon_get_theme_option( 'catalog_icon' );
  $catalog_text = carbon_get_theme_option( 'catalog_text' );

  $description = carbon_get_theme_option( 'main_description' );
  $org_name = carbon_get_theme_option( 'org_name' );

  $contacts_main_phone_front = phone_front(carbon_get_theme_option( 'main_phone' ));
  $contacts_add_phone_front = phone_front(carbon_get_theme_option( 'second_phone' ));
  $contacts_main_phone_href = phone_href(carbon_get_theme_option( 'main_phone' ));
  $contacts_add_phone_href = phone_href(carbon_get_theme_option( 'second_phone' ));

  $contacts_mail = carbon_get_theme_option( 'email' );
  $contacts_vk = carbon_get_theme_option( 'vk' );
  $contacts_wa = phone_wa(carbon_get_theme_option( 'wa' ));
  $contacts_tg = carbon_get_theme_option( 'tg' );
  $contacts_inst = carbon_get_theme_option( 'inst' );
  $contacts_fb = carbon_get_theme_option( 'fb' );

  $address_city = carbon_get_theme_option( 'address_city' );
  $address_street = carbon_get_theme_option( 'address_street' );
  $address_building = carbon_get_theme_option( 'address_build' );
  $address_zipcode = carbon_get_theme_option( 'address_index' );
  $address_latitude = carbon_get_theme_option( 'address_latitude' );
  $address_longitude = carbon_get_theme_option( 'address_longitude' );

  $faq_title = carbon_get_theme_option( 'main_faq_title' );
  $faq_items = carbon_get_theme_option( 'main_faq' );
  $testimonials_title = carbon_get_theme_option( 'main_testimonials_title' );
  $testimonial_items = carbon_get_theme_option( 'testimonial' );
  $sidebar_title = carbon_get_theme_option( 'sidebar_title' );
  $sidebar_description = carbon_get_theme_option( 'sidebar_description' );
  $advantages = carbon_get_theme_option( 'advantages' );
 

  $portfolio_page_items = carbon_get_the_post_meta( 'portfolio_page' );
  $text_404 = carbon_get_theme_option( 'text_404' );


  $cf_title = carbon_get_theme_option( 'cf_title' );
  $cf_subtitle = carbon_get_theme_option( 'cf_subtitle' );
  $cf_shortcode = carbon_get_theme_option( 'cf_shortcode' );


  //Main page fields
  $main_banners = carbon_get_the_post_meta( 'main_banners' );
  $info_blocks = carbon_get_the_post_meta( 'info_blocks' );
  $advantages = carbon_get_the_post_meta( 'advantages' );
  $testimonials = carbon_get_theme_option( 'testimonials' );

  //Pages
  $page_images = carbon_get_the_post_meta( 'page_images' );

  // Product page
  $price_text = carbon_get_theme_option( 'price_text' );

?>