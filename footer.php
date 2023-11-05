    <footer>
        <?php
            wp_nav_menu([
                'theme_location' => 'footer-menu',
                'container'      => false, // On retire le conteneur généré par WP
            ]);
        ?>
    </footer>

    <?php wp_footer(); ?>
    
</body>

</html>