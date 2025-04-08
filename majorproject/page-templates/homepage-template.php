<?php
/**
 * Template Name: Major Project Homepage Template
 * Template Post Type: page
 */
get_header();
?>
<main>
    <section class="home-masthead"
        style="background-image: url('<?php echo wp_kses_post(get_field('masthead_image')); ?>')">
        <div>
            <h1><?php echo wp_kses_post(get_field('masthead_title')); ?></h1>
        </div>
    </section>
    <section class="home-row-one">
        <h3><?php echo wp_kses_post(get_field('row_one_title')); ?></h3>
        <p><?php echo wp_kses_post(get_field('row_one_text')); ?></p>
    </section>
    <section class="shortcode">
        <?php  echo do_shortcode("[products limit=4 columns=4 order=desc]");?>
    </section>
</main>

<?php
get_footer();
?>