<?php
/* PRODUCT REVIEW SHORTCODFE */

function product_review_shortcode() {
    global $product;
    $product_id = $product->get_id();
	$review_count = $product->get_review_count();
	$average      = $product->get_average_rating();

    $comments = get_comments( array (
        'number'    => '5',
        'post__in'  => array($product_id), // <= HERE your array of product Ids
        'post_type' => 'product',
        'meta_key'  => 'rating',
        'orderby'   => 'meta_value_num',
        'order'     => 'DESC'
    ) );
    ?>
        <div class="product_rating">
            <?php echo wc_get_rating_html( $average, $rating_count ); ?>
        </div>
        <button>Review</button>       


        <div class="product_reviews">
            <?php foreach($comments as $comment):?>
                <?php 
                    $timestamp = strtotime( $comment->comment_date ); //Changing comment time to timestamp
                    $date = date('F d, Y', $timestamp);
                ?>
                <div class="review_item" itemprop="reviews" itemscope itemtype="http://schema.org/Review">
                    <div class="review_item_header">
                        <div class="revire_header_left">
                           <div class="author_img">
                                <?php echo get_avatar( $comment->comment_author_email, $size = '50' ); ?>
                            </div>
                            <div class="author_name" itemprop="author">
                                <?php echo $comment->comment_author; ?>
                            </div> 
                            <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="<?php echo esc_attr( get_comment_meta( $comment->comment_ID, 'rating', true ) ); ?>">
                                <span style="width:<?php echo get_comment_meta( $comment->comment_ID, 'rating', true )*22; ?>px"><span itemprop="ratingValue"><?php echo get_comment_meta( $comment->comment_ID, 'rating', true ); ?></span> <?php _e('out of 5', 'woocommerce'); ?></span>
                            </div>
                        </div>
                        <div class="review_header_right">
                            <time itemprop="datePublished" datetime="<?php echo $comment->comment_date; ?>"><?php echo $date; ?></time>
                        </div>
                        
                    </div>
                    <div itemprop="description" class="review_content">
                        <?php echo $comment->comment_content; ?>
                    </div>
                </div>
            <?php endforeach ?>

            <pre>
                <?php print_r($comments) ?>
            </pre>
        </div>
    <?
}

add_shortcode('single_product_review', 'product_review_shortcode');