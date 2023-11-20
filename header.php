<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motaphoto</title>
	<?php wp_head(); ?>
</head>

<body>
    <nav role="navigation" class="main-menu" aria-label="<?php _e('Menu principal', 'text-domain'); ?>"></a>
        <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/images/Logo.png' ?>" alt="Nathalie Mota">
        <?php
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'container'      => false, // On retire le conteneur généré par WP
                'walker'         => new Ally_Walker_Nav_Menu(),
            ]);
        ?>
        <!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"> -->
        <div class="menu-toggle">
            <i class="fa-solid fa-bars"></i>
            <i class="fa-solid fa-xmark"></i>
        </div>
    </nav>

    <?php get_template_part( 'templates_part/modal' ); ?>