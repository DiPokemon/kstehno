
        </main>
        
        <footer itemprop="mainContentOfPage" itemscope itemtype="https://schema.org/WPFooter">
        <?php include 'template-parts/variables.php' ?>
        <p class="work_only work_only_footer">Работаем только с юридическими лицами и индивидуальными предпринимателями.</p>
            <div class="container">
                    <div class="footer_top">
                        <div class="footer_top_left">
                            <?php
                                $args = array(
                                    'container'       => 'nav',          
                                    'container_class' => 'middle_menu menu',           
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
                        </div>                        
<!--  -->
                        <div class="footer_top_middle">
                            <div class="logo_wrapper">
                                <?php the_custom_logo() ?>
                            </div>                            
                            <!--
                            <div class="city_list">
                                Брянск                            
                            </div>
                            -->
                        </div>

                        <div class="footer_top_right">
                            <div class="footer_contacts">
                                <?php if($contacts_main_phone_href) : ?>
                                    <a href="tel:<?= $contacts_main_phone_href ?>" class="footer_phone-link"><i class="fa-solid fa-phone"></i><?= $contacts_main_phone_front ?></a>
                                    <a href="tel:<?= $contacts_main_phone_href ?>" class="footer_phone-link-mob"><i class="fa-solid fa-phone"></i></a>
                                <?php endif; ?>
                                <?php get_template_part( 'template-parts/socials' ); ?>
                                                            
                            </div> 
                            <div class="footer_address">                                    
                                <?= $address_city ?>, <?= $address_street ?>, <?= $address_building ?>
                            </div>   

                            <!--
                            <div class="footer_search">
                                <?= do_shortcode('[aws_search_form]'); ?>
                            </div>
                            -->
                            <!--
                            <div class="footer_actions">
                                <a onclick="openModal()" href="javascript:void(0)" class="search_icon_mob"><i class="fa-solid fa-magnifying-glass"></i></a>
                                <a href="" class="btn_compare" data-title="Сравнение"><i class="fa-solid fa-code-compare"></i></a>
                                <a href="" class="btn_favorites" data-title="Избранное"><i class="fa-regular fa-heart"></i></a>
                                 <a onclick="openCartPanel()" href="javascript:void(0)" class="btn_mini_cart" data-title="Корзина"><i class="fa-solid fa-cart-shopping"></i><?php //kstehno_woocommerce_cart_link() ?></a>
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

                                <div  id="footer_search_modal" class="search_modal_mob">
                                    <div class="search_modal_close_wrapper">
                                        <a class="search_modal_close" onclick="closeModal(event)" href="javascript:void(0)"><i class="fa-solid fa-xmark"></i></a>
                                    </div>
                                    <?= do_shortcode('[aws_search_form]'); ?>
                                </div>
                            </div> 
                            -->
                        </div>                                             
                    </div>

                <!--
                <div class="footer_top">
                    <div class="footer_logo_wrapper logo_wrapper">
                        <?php the_custom_logo() ?>
                    </div>
                    <div class="footer_top_left">
                            <?php
                                $args = array(
                                    'container'       => 'nav',          
                                    'container_class' => 'footer_left_menu menu',           
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
                    </div>
                    <div class="footer_top_middle">
                            <?php
                                $args = array(
                                    'container'       => 'nav',          
                                    'container_class' => 'footer_right_menu menu',           
                                    'menu_class'      => 'menu_list',          
                                    'fallback_cb'     => 'wp_page_menu',            
                                    'link_class'     => 'menu_link',           
                                    'theme_location'  => 'footer_right_menu',
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
                    <div class="footer_top_right">
                        <?php include 'template-parts/contacts.php' ?>
                        

                    </div>
                </div>-->                
            </div>

            <div class="footer_bottom">
                <div class="footer_bottom_left">
                    <?php if ($copyright) : ?>
                        <span><?= $copyright ?></span>
                    <?php else: ?>
                        <span>© <?= $org_name ?>, 2023 - <?= date('Y'); ?></span>
                    <?php endif; ?>    
                </div>
                <div class="footer_bottom_middle">
                    <?php if ($htmlsitemap_link) : ?>
                        <a href="<?= $htmlsitemap_link ?>" class="footer_html_sitemap"><?= $htmlsitemap_text ?></a>
                    <?php endif; ?>
                </div>
                <div class="footer_bottom_right">
                    <?php if ($policy_link) : ?>
                        <a href="<?= $policy_link ?>" class="footer_policy"><?= $policy_text ?></a>
                    <?php endif; ?>
                </div>
            </div>
        
        </footer>    
    </body>
</html>

<?php wp_footer(); ?>