<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- IOS compatible -->
    <meta name='apple-mobile-web-app-capable' content="yes">
    <meta name='apple-mobile-web-app-title' content='Travel Agency'>
    <!-- Android Compatible -->
    <meta name="theme-color" content="#a61206">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Travel Agency">


    <?php wp_head() ?>
</head>
<body <?php body_class() ?>>

<header class="site-header text-center">
    <div class="logo">
        <a href='<?php echo esc_url(home_url()) ?>'><img
                    src="<?php echo get_template_directory_uri() ?>/Images/logo.png" alt="logo"></a>
    </div>
    <a href="#" class="mobile">
        <div class="mobile-menu">
            Menu
        </div>
    </a>
    <?php
    $args = array(
        'theme-location' => 'main-menu',
        'container' => 'nav',
        'container_class' => 'main-nav',
    );
    wp_nav_menu($args);
    ?>
</header>
