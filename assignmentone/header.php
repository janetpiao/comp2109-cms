<!doctype html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="default-header">
        <div>
            <a href="<?php echo esc_url(hpme_url()); ?>">
                <img src="<?php echo esc_url(home_url('wp-content/uploads/2025/03/logo.png'))?>" alt="header logo"></a>
        </div>
        <nav>
            <?php 
                wp_nav_menu(array(
                    'menu'     => 'main',
                    'theme_location' => '',
                    'depth'    => 2,
                    'fallback_cb' => false
                ));
            ?>
        </nav>
    </header>


</body>

</html>