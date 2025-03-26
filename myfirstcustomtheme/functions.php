<?php
// add our menu function
function customtheme_theme_setup(){
    register_nav_menus(array(
        'header' => 'Header menu',
        'footer' => 'Footer menu'
    ));
}
add_action('after_setup_theme', 'customtheme_theme_setup');
// add support for our featured images
add_theme_support('post-thumbnails');
// set up our footer widgets
function cmsclass_widgets_init(){
    register_sidebar(array(
        'name' => __('Footer Widget Area One', 'cmsclass'),
        'id' =>  'footer-widget-area-one',
        'description' => __('The first footer widget area', 'cmsclass'),
        'before_widget' => '<div class="logo-widget">',
        'after_widget' => '</div>',
    ));
    register_sidebar(array(
        'name' => __('Footer Widget Area Two', 'cmsclass'),
        'id' =>  'footer-widget-area-two',
        'description' => __('The second footer widget area', 'cmsclass'),
        'before_widget' => '<div class="about-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer Widget Area Three', 'cmsclass'),
        'id' =>  'footer-widget-area-three',
        'description' => __('The third footer widget area', 'cmsclass'),
        'before_widget' => '<div class="menu-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer Widget Area Four', 'cmsclass'),
        'id' =>  'footer-widget-area-four',
        'description' => __('The fourth footer widget area', 'cmsclass'),
        'before_widget' => '<div class="contact-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'cmsclass_widgets_init');
// our first custom plugin
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

// // Custom Plugin
// function retro_game_init() {
//   $args = array(
//     'label' => 'Retro Games',
//     'public' => true,
//     'show_ui' => true,
//     'capability_type' => 'post',
//     'taxonomies' => array('category'),
//     'hierarchical' => false,
//     'query_var' => true,
//     'menu_icon' => 'dashicons-album',
//     'supports' => array(
//       'title',
//       'editor',
//       'excerpts',
//       'trackbacks',
//       'comments',
//       'thumbnail',
//       'author',
//       'post-formats',
//       'page-attributes',
//     )
//   );
// }

// build our shortcode for our CMS post type
function cms_post_shortcode(){
    $query = new WP_Query(array('post_type' => 'cmsPost', 'post_per_page' => 8, 'order' => 'asc'));
    while($query -> have_post()) : $query -> the_post();
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









?>