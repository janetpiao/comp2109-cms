<?php
/**
 * Template Name: Custom Homepage
 * Template Post Type: page
 */
get_header();
?>

<section class="home-masthead"
    style="background-image: url('<?php echo wp_kses_post(the_field('masthead_image')); ?>')">
    <div>
        <h1><?php echo wp_kses_post(the_field('masthead_title')); ?></h1>
    </div>
</section>
<section class="home-row-one">
    <h3><?php echo wp_kses_post(the_field('row_one_title')); ?></h3>
    <p><?php echo wp_kses_post(the_field('row_one_text')); ?></p>
</section>
<section class="home-row-two">
    <div>
        <h3><?php echo wp_kses_post(the_field('row_two_title')); ?></h3>
        <p><?php echo wp_kses_post(the_field('row_two_text')); ?></p>
    </div>
    <div>
        <img src="<?php echo wp_kses_post(the_field('row_two_image')); ?>"
            alt="<?php echo wp_kses_post(the_field('row_two_image_alt')); ?>">
    </div>
</section>
<section class="shortcode">
    <?php  echo do_shortcode("[cmsPost]");?>
</section>
<?php
get_footer();
?>