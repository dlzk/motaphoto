    <section class="lightbox">
        <button class="lightbox__close"><i class="fa-solid fa-xmark"></i></button>
        <button class="lightbox__next flex">Suivante<i class="fa-solid fa-arrow-right"></i></button>
        <button class="lightbox__prev flex"><i class="fa-solid fa-arrow-left"></i>Précédente</button>
        <div class="lightbox__container">
            <img src="" alt="">  
        </div>
        <p class="lightbox__ref"><?php echo get_field('reference'); ?></p>
        <p class="lightbox__cat"><?php echo strip_tags(get_the_term_list( get_the_ID() , 'categorie')); ?></p>
    </section>
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