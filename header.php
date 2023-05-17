<!DOCTYPE html>
<?php include 'template-parts/variables.php' ?>
<html lang="ru">
    <head itemscope itemtype="http://schema.org/WPHeader">
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />    
        
        <?php wp_head();?>
        
    </head>
    <body>
        <header>      
            <div class="header_container">
                <div class="header_wrapper container">
                    <div class="header_top">
                        <div class="header_top_left">
                            <div class="logo_wrapper">
                                <?php the_custom_logo() ?>
                            </div>
                            <div class="city_list">
                                Брянск                            
                            </div>
                        </div>
                        
                        <div class="header_contacts">
                            <a href="tel:<?= $contacts_main_phone_href ?>" class="header_phone-link"><i class="fa-solid fa-phone"></i><?= $contacts_main_phone_front ?></a>            
                            <?php get_template_part( 'template-parts/socials' ); ?>  
                        </div>  
                        <div class="header_actions">
                            <a href="" class="btn_compare" data-title="Сравнение"><i class="fa-solid fa-code-compare"></i></a>
                            <a href="" class="btn_favorites" data-title="Избранное"><i class="fa-regular fa-heart"></i></a>
                            <a href="#" class="btn_mini_cart" data-title="Корзина"><i class="fa-solid fa-cart-shopping"></i></a>

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
                        
                        <div class="header_search">
                            Поиск
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
                    </div>
                    
                    
                    

                                  
                </div>                
            </div>            
        </header>
    
        <main>