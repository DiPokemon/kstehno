
        </main>
        <footer itemprop="mainContentOfPage" itemscope itemtype="https://schema.org/WPFooter">
            <?php include 'template-parts/variables.php' ?>
            <div class="container">
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
                </div>                
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