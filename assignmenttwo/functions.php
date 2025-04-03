<?php
// Add menu functions
function mytheme_theme_setup(){
    register_nav_menus(array(
        'header' => 'Header menu',
        'footer' => 'Footer menu'
    ));
}

add_action('after_setup_theme', 'mytheme_theme_setup');

// Add support for our featured images
add_theme_support('post-thumbnails');

// Set up our footer widgets
function assignone_widgets_init(){
    register_sidebar(array(
        'name'          => __('Footer Widget Area One', 'cmsclass'),
        'id'            => 'footer-widget-area-one',
        'description'   => __('The first footer widget area', 'cmsclass'),
        'before_widget' => '<div class="logo-widget">',
        'after_widget'  => '</div>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Widget Area Two', 'cmsclass'),
        'id'            => 'footer-widget-area-two',
        'description'   => __('The second footer widget area', 'cmsclass'),
        'before_widget' => '<div class="about-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Widget Area Three', 'cmsclass'),
        'id'            => 'footer-widget-area-three',
        'description'   => __('The third footer widget area', 'cmsclass'),
        'before_widget' => '<div class="menu-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Widget Area Four', 'cmsclass'),
        'id'            => 'footer-widget-area-four',
        'description'   => __('The fourth footer widget area', 'cmsclass'),
        'before_widget' => '<div class="contact-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'assignone_widgets_init');

// custom plugin
function cms_plugin_init(){
    $args = array(
        'label'           => 'CMS Post Type',
        'public'          => true,
        'show_ui'         => true,
        'capability_type' => 'post',
        'taxonomies'      => array('category'),
        'hierarchical'    => false,
        'query_var'       => true,
        'menu_icon'       => 'dashicons-album',
        'supports'        => array(
            'title',
            'editor',
            'excerpts',
            'trackbacks',
            'comments',
            'thumbnail',
            'author',
            'post-formats',
            'page-attributes',
        )
        );
        register_post_type('cmsPost', $args);
}
add_action('init', 'cms_plugin_init');

// Build shortcode for CMS Post Type
function cms_post_shortcode(){
    $query = new WP_Query(array('post_type' => 'cmsPost', 'post_per_page' => 6, 'order' => 'asc'));
    while($query ->have_post()) : $query -> the_post();
    ?>

<div class="cms-post-container">
    <div>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
    </div>
    <div>
        <h4><?php the_title(); ?></h4>
        <?php the_content(); ?>
        <a href="<?php  the_permalink();?>">Learn More</a>
    </div>
</div>
<?php
        wp_reset_postdata();
        endwhile;
}

// register our shortcode
add_shortcode('cmsPost', 'cms_post_shortcode');

// adding woocommerce support to our theme no usages
function mytheme_add_woocommerce_support() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

function enqueue_wc_cart_fragments(){
    wp_enqueue_script('wc-cart-fragments');
}
add_action('wp_enqueue_scripts', 'enqueue_wc_cart_fragments');

/**
 * The following PHP Hooks are the default hooks for WooCommerce. I have listed them here, so you don't need to search them out.


 * Before content
 * add_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
 * add_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 1 );
 * add_action( 'woocommerce_before_single_product', 'woocommerce_Extract', 10 );


 * Left column
 * add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
 * add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
 * add_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 ); // Corrected hook name

 * Right column
 * add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
 * add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
 * add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 16 );
 * add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

 * Add to cart
 * do_action( 'woocommerce_before_add_to_cart_form' );
 * do_action( 'woocommerce_before_add_to_cart_button' );
 * add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

 * add_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
 * add_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 38 );
 * add_action( 'woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30 );
 * add_action( 'woocommerce_external_add_to_cart', 'woocommerce_external_add_to_cart', 30 );
 * add_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
 * add_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
 * do_action( 'woocommerce_before_quantity_input_field' );
 * do_action( 'woocommerce_after_quantity_input_field' );
 * do_action( 'woocommerce_after_add_to_cart_button' );
 * do_action( 'woocommerce_after_add_to_cart_form' );

 * Product meta
 * add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
 * do_action( 'woocommerce_product_meta_start' );
 * do_action( 'woocommerce_product_meta_end' );

 * Sharing
 * add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
 * do_action( 'woocommerce_share' );

 * Tabs, upsells and related products
 * add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
 * add_action( 'woocommerce_product_additional_information', 'wc_display_product_attributes', 10 );
 * do_action( 'woocommerce_product_after_tabs' );
 * add_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
 * add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


 * Reviews
 * add_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
 * add_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10 );
 * add_action( 'woocommerce_review_meta', 'woocommerce_review_display_meta', 10 );
 * do_action( 'woocommerce_review_before_comment_text', $comment );
 * add_action( 'woocommerce_review_comment_text', 'woocommerce_review_display_comment_text', 10 );
 * do_action( 'woocommerce_review_after_comment_text', $comment );


 * After content
 * do_action( 'woocommerce_after_single_product' );
 * do_action( 'woocommerce_after_main_content' );
 */

//  add_action( 'woocommerce_before_single_product_summary', function(){print('<h4>This is our first WooCommerce Action Hook!!!</h4>');
// });

/* Removes the title */
// 'woocommerce_single_product_summary' it is like a category
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

/* Removes the price */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

/* Removes all the add to cart options */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

/* Removes all the product data tabs */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

/* Removes all the product attributes */
remove_action('woocommerce_product_additional_information', 'wc_display_product_attributes', 10);

/* Removes all the up-sale products */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);

/* Removes all the related products */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

/* Removes all the single product variations */
remove_action('woocommerce_single_variation', 'woocommerce_single_variation', 10);

/* Removes all the single product metadata, example SKU */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

/**
 * Now let's add our product details back but this time we will change the order in which the information is displayed
 */
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 15 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 15 );
// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 15 );
add_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 10);
add_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 15);
add_action('woocommerce_product_additional_information', 'wc_display_product_attributes', 15);
add_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
function web_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
add_action('after_setup_theme', 'web_add_woocommerce_support');

?>