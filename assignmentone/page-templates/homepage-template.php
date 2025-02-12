<?php
/**
 * Template Name: Assignment one Theme Creation
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
    <img src="<?php echo wp_kses_post(the_field('row_one_image')); ?>"
        alt="<?php echo wp_kses_post(the_field('row_one_image_alt')); ?>">
    <p><?php echo wp_kses_post(the_field('row_one_text')); ?></p>
</section>
<section class="home-row-two">
    <h3><?php echo wp_kses_post(the_field('row_two_title')); ?></h3>
    <p><?php echo wp_kses_post(the_field('row_two_text')); ?></p>
    <label for="row_two_email"><?php echo esc_html(get_field('row_two_email_label')); ?></label>
    <input type="email" name="row_two_email" id="row_two_email">
</section>
<section class="shortcode">
    <?php  echo do_shortcode("[cmsPost]");?>
</section>

<?php
get_footer();
?>