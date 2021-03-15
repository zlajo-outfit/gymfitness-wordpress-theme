<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="container header-grid">
            <div class="navigation-bar">
                <div class="logo">
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri() . '/img/logo.svg' ?>">
                    </a>
                    <!--link to home url-->
                </div>
                <!--logo-->

                <?php 
            $args = array(
                'theme_location' => 'main-menu',
                'container' => 'nav',
                'container_class' => 'main-menu'
            );

            wp_nav_menu($args);
            ?>

            </div>
            <!--navigation-bar-->
            <div class="tagline text-center">
                <h1><?php the_field('hero_tagline') ?></h1>
                <p><?php the_field('hero_content') ?></p>
            </div><!--tagline-->
        </div>
        <!--container-->

    </header>
    <!--site-header-->