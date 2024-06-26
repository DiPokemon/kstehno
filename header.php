<!DOCTYPE html>
<?php include 'template-parts/variables.php' ?>
<html lang="ru" prefix="og: http://ogp.me/ns# article: http://ogp.me/ns/article# profile: http://ogp.me/ns/profile# fb: http://ogp.me/ns/fb#" itemscope itemtype="http://schema.org/WebPage">
    <head itemscope itemtype="http://schema.org/WPHeader">
        <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-WVBZ75349V"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-WVBZ75349V');
</script>

        <link itemprop="url" href="<?= $currenturl ?>" />
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />    
        
        <?php wp_head();?>
        
    </head>
    <body <?php body_class(); ?> itemprop="mainContentOfPage">
        <div itemprop="isPartOf" itemscope itemtype="https://schema.org/WebSite">
            <link itemprop="url" href="<?= get_site_url() ?>" />
        </div>
        <header itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WPHeader">  
        <p class="work_only">Работаем только с юридическими лицами и индивидуальными предпринимателями.</p>  
            <div class="header_container">
            
                <div class="header_wrapper container">
                    <div class="header_top">
                        <div class="header_top_left">
                            <?php
                                $args = array(
                                    'container'       => 'nav',          
                                    'container_class' => 'middle_menu menu',           
                                    'menu_class'      => 'menu_list',          
                                    'fallback_cb'     => 'wp_page_menu',            
                                    'link_class'     => 'menu_link',           
                                    'theme_location'  => 'middle_menu',
                                    'add_li_class'    => 'menu_item',
                                    'echo'          => false,
                                );
                                $temp_menu = wp_nav_menu($args);
                                preg_match_all("~<a (.*?)>(.*)</a>~", $temp_menu, $matches);
                                foreach($matches[0] as $value){
                                    if(strpos($value, "<span") === false){
                                        $temp_value = preg_replace("~<a (.*?)>(.*)</a>~", "<a $1><span itemprop='name'>$2</span></a>", $value);
                                        $temp_menu = str_replace($value, $temp_value, $temp_menu);
                                    }else{
                                        $temp_value = str_replace("<span", "<span itemprop='name'", $value);
                                        $temp_menu = str_replace($value, $temp_value, $temp_menu);
                                    }
                                }
                                echo $temp_menu;
                            ?>      
                        </div>

                        <div class="header_top_middle">
                            <div class="logo_wrapper">
                                <?php the_custom_logo() ?>
                            </div>                            
                            <!--
                            <div class="city_list">
                                Брянск                            
                            </div>
                            -->
                        </div>
                        <div class="header_search desc">
                                <?= do_shortcode('[aws_search_form]'); ?>
                            </div>
                        <div class="header_top_right">
                        
                            <div class="header_contacts">
                                <div class="header_contacts_grid">
                                <?php if($contacts_mail) : ?>
                                    <a href="mailto:<?= $contacts_mail ?>" class="header_mail-link"><i class="fa-solid fa-envelope"></i><?= $contacts_mail ?></a>
                                    <a href="mailto:<?= $contacts_mail ?>" class="header_mail-link-mob"><i class="fa-solid fa-envelope"></i></a>
                                <?php endif; ?>
                                
                                <?php if($contacts_main_phone_href) : ?>
                                    <a href="tel:<?= $contacts_main_phone_href ?>" class="header_phone-link"><i class="fa-solid fa-phone"></i><?= $contacts_main_phone_front ?></a>
                                    <a href="tel:<?= $contacts_add_phone_href ?>" class="header_phone-link"><i class="fa-solid fa-phone"></i><?= $contacts_add_phone_front ?></a>
                                    <a href="tel:<?= $contacts_main_phone_href ?>" class="header_phone-link-mob"><i class="fa-solid fa-phone"></i></a>
                                <?php endif; ?>
                                </div>
                                <?php get_template_part( 'template-parts/socials' ); ?>  
                            </div>  

                            <div class="header_actions">
                                <a onclick="openModal()" href="javascript:void(0)" class="search_icon_mob"><i class="fa-solid fa-magnifying-glass"></i></a>
                                <!--<a href="" class="btn_compare" data-title="Сравнение"><i class="fa-solid fa-code-compare"></i></a>
                                <a href="" class="btn_favorites" data-title="Избранное"><i class="fa-regular fa-heart"></i></a>-->
                                <!-- <a onclick="openCartPanel()" href="javascript:void(0)" class="btn_mini_cart" data-title="Корзина"><i class="fa-solid fa-cart-shopping"></i><?php //kstehno_woocommerce_cart_link() ?></a> -->
                                <a onclick="openCartPanel()" href="javascript:void(0)" class="btn_mini_cart" data-title="Корзина"><i class="fa-solid fa-cart-shopping"></i>
                                    <span class="cart-contents"> 
                                        <span class="count">
                                            <?= WC()->cart->get_cart_contents_count(); ?>
                                        </span>
                                    </span>
                                </a>
                            
                                <div id="mini_cart_panel" class="mini_cart_panel">
                                    <div class="mini_cart_top">
                                        <span>Корзина</span>
                                        <a onclick="closeCartPanel()" href="javascript:void(0)" class="close_mini_cart"><i class="fa-solid fa-xmark"></i></a>
                                    </div>                                
                                    <?php woocommerce_mini_cart() ?>
                                </div>

                                <div  id="header_search_modal" class="search_modal_mob">
                                    <div class="search_modal_close_wrapper">
                                        <a class="search_modal_close" onclick="closeModal(event)" href="javascript:void(0)"><i class="fa-solid fa-xmark"></i></a>
                                    </div>
                                    <?= do_shortcode('[aws_search_form]'); ?>
                                </div>
                            </div> 
                        </div>                                             
                    </div>



                    <div class="header_middle">                        
                            <?php
                                $args = array(
                                    'container'       => 'nav',          
                                    'container_class' => 'middle_menu menu',           
                                    'menu_class'      => 'menu_list',          
                                    'fallback_cb'     => 'wp_page_menu',            
                                    'link_class'     => 'menu_link',           
                                    'theme_location'  => 'middle_menu',
                                    'add_li_class'    => 'menu_item',
                                    'echo'          => false,
                                );
                                $temp_menu = wp_nav_menu($args);
                                preg_match_all("~<a (.*?)>(.*)</a>~", $temp_menu, $matches);
                                foreach($matches[0] as $value){
                                    if(strpos($value, "<span") === false){
                                        $temp_value = preg_replace("~<a (.*?)>(.*)</a>~", "<a $1><span itemprop='name'>$2</span></a>", $value);
                                        $temp_menu = str_replace($value, $temp_value, $temp_menu);
                                    }else{
                                        $temp_value = str_replace("<span", "<span itemprop='name'", $value);
                                        $temp_menu = str_replace($value, $temp_value, $temp_menu);
                                    }
                                }
                                echo $temp_menu;
                            ?>      
                        
                            <div class="header_actions">
                                <a onclick="openModalMobile()" href="javascript:void(0)" class="search_icon_mob"><i class="fa-solid fa-magnifying-glass"></i></a>
                                <!--<a href="" class="btn_compare" data-title="Сравнение"><i class="fa-solid fa-code-compare"></i></a>
                                <a href="" class="btn_favorites" data-title="Избранное"><i class="fa-regular fa-heart"></i></a>-->
                                <!-- <a onclick="openCartPanel()" href="javascript:void(0)" class="btn_mini_cart" data-title="Корзина"><i class="fa-solid fa-cart-shopping"></i><?php //kstehno_woocommerce_cart_link() ?></a> -->
                                <a onclick="openCartPanelMobile()" href="javascript:void(0)" class="btn_mini_cart" data-title="Корзина"><i class="fa-solid fa-cart-shopping"></i>
                                    <span class="cart-contents"> 
                                        <span class="count">
                                            <?= WC()->cart->get_cart_contents_count(); ?>
                                        </span>
                                    </span>
                                </a>
                            
                                <div id="mini_cart_panel_mob" class="mini_cart_panel">
                                    <div class="mini_cart_top">
                                        <span>Корзина</span>
                                        <a onclick="closeCartPanelMobile()" href="javascript:void(0)" class="close_mini_cart"><i class="fa-solid fa-xmark"></i></a>
                                    </div>                                
                                    <?php woocommerce_mini_cart() ?>
                                </div>

                                <div  id="header_search_modal_mob" class="search_modal_mob">
                                    <div class="search_modal_close_wrapper">
                                        <a class="search_modal_close" onclick="closeModalMobile(event)" href="javascript:void(0)"><i class="fa-solid fa-xmark"></i></a>
                                    </div>
                                    <?= do_shortcode('[aws_search_form]'); ?>
                                </div>
                            </div> 
                    </div>

                    <div class="header_bottom">
                        <div class="header_burger">
                            <span></span>
                        </div>
                        
                        <?php
                            $args = array(
                                'container'       => 'nav',          
                                'container_class' => 'header_menu menu',           
                                'menu_class'      => 'menu_list',          
                                'fallback_cb'     => 'wp_page_menu',            
                                'link_class'     => 'menu_link',           
                                'theme_location'  => 'main_menu',
                                'add_li_class'    => 'menu_item',
                                'echo'          => false,               
                            );
                            $temp_menu = wp_nav_menu($args);
                            preg_match_all("~<a (.*?)>(.*)</a>~", $temp_menu, $matches);
                            foreach($matches[0] as $value){
                                if(strpos($value, "<span") === false){
                                    $temp_value = preg_replace("~<a (.*?)>(.*)</a>~", "<a $1><span itemprop='name'>$2</span></a>", $value);
                                    $temp_menu = str_replace($value, $temp_value, $temp_menu);
                                }else{
                                    $temp_value = str_replace("<span", "<span itemprop='name'", $value);
                                    $temp_menu = str_replace($value, $temp_value, $temp_menu);
                                }
                            }
                            echo $temp_menu;
                            
                        ?>
                        
                        
                        <div class="shop_link_wrapper">
                            <a href="/catalog/" class="shop_link btn">
                                <?php if($catalog_icon && $catalog_text) :?>
                                    <?= $catalog_icon.$catalog_text ?>
                                <?php elseif ($catalog_icon && !$catalog_text) : ?>
                                    <?= $catalog_icon.__('Каталог','kstehno') ?>
                                <?php elseif (!$catalog_icon && $catalog_text) : ?>
                                    <?= '<i class="fa-solid fa-gear"></i>'.$catalog_text ?>
                                <?php else: ?>
                                    <i class="fa-solid fa-gear"></i> <?= __('Каталог','kstehno') ?>
                                <?php endif; ?>
                            </a>
                        </div>
                        

                        
                    </div>
                    
                    
                    

                                  
                </div>                
            </div>  
            
            <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(95432537, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/95432537" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</header>


<main role="main">



