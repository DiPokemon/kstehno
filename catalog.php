<?php
/*
* Template name: Шаблон "Каталог"
*/
?>

<?php get_header(); ?>
<?php include 'template-parts/variables.php' ?>
<?php get_template_part( 'template-parts/block', 'pageheader' ); ?>

                <div class="container categories_container">
                    <div class="categories">
                        <?php 
                            
                            $parents = get_categories(array(
                                'hierarchical' => false,
                                'taxonomy'   =>  'product_cat',
                                'hide_empty' => false,
                                'parent' => 0
                            ));
                        ?>
                        <?php if(!empty($parents)): ?>
                            
                            <?php 
                            $i_parents = 1;
                                foreach($parents as $parent) : 
                            ?>
                                
                                <div class="category">
                                    <a class="category_parent_link" href="<?= get_category_link($parent->term_id) ?>"><?= $parent->name; ?></a>

                                    <ul class="child_categories_list">
                                        <?php 
                                            $child_categories = get_categories(array(
                                                'parent' => $parent->term_id,
                                                'taxonomy'   =>  'product_cat',
                                                'hide_empty' => false
                                            )); 
                                            $i_child = 1;
                                            foreach ($child_categories as $child_category):
                                        ?>
                                        <li class="child_category">
                                            <a href="<?= get_category_link($child_category->term_id) ?>" class="child_category_link"><?= $child_category->name; ?></a>
                                        </li>
                                        <?php if($i_child++ == 3) break; ?>
                                        <?php endforeach; ?>
                                    </ul>

                                </div>                                
                            <?php endforeach; ?>

                        <?php endif; ?>            
                    </div>
                </div>    
                <?php get_template_part( 'template-parts/block', 'featured-products' ); ?>

                <?php get_footer(); ?>