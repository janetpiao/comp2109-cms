<?php 
/*
* This is the default template file.
*/
get_header();
$featuredImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
?>
<!-- display pages content -->
<section class="post-masthead" style="background: url('<?php echo $featuredImg[0];?>'); ?>">
    <div>
        <h1><?php the_title(); ?></h1>
    </div>
</section>


<section class="homepage-content">
    <?php the_content(); ?>
</section>

<?php 
// Add our footer
get_footer();
?>