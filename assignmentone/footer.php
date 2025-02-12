<footer>
    <section class="top-footer">
        <div class="first-widget">
            <a href="<?php echo esc_url(home_url());?>">
                <?php dynamic_sidebar('footer-widget-area-one'); ?>
        </div>
        <div class="second-widget">
            <?php dynamic_sidebar('footer-widget-area-two'); ?>
        </div>

        <div class="third-widget">
            <?php dynamic_sidebar('footer-widget-area-three'); ?>
        </div>
        <div class="fourth-widget">
            <?php dynamic_sidebar('footer-widget-area-four'); ?>
        </div>
</footer>
</body>

</html>