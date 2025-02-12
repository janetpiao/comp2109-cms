<?php 
get_header();
?>

<!-- display pages content -->

<section class="homepage-content">
    <?php echo get_the_content(); ?>
</section>

<?php 
// Add our footer
get_footer();
?>