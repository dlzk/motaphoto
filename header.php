<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
	<?php wp_head(); ?>
</head>

<body>
    <nav role="navigation" aria-label="<?php _e('Menu principal', 'text-domain'); ?>">
        <?php
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'container'      => false, // On retire le conteneur généré par WP
                'walker'         => new Ally_Walker_Nav_Menu(),
            ]);
        ?>
    </nav>