<div class="photo-block">
    <?php 
    // Récupère l'ID du post passé au template part
    $post_id = $args['post_id']; 

    // Assure-toi que l'ID est valide todo
    if ($post_id) {
        $photo_id = get_field('photo', $post_id); // Utilise get_field avec l'ID du post
        $photo_url = wp_get_attachment_image_url($photo_id, 'full');
        $photo_alt = get_post_meta($photo_id, '_wp_attachment_image_alt', true);
        $reference = get_field('reference', $post_id); // Récupère la référence de la photo
        $categorie_terms = wp_get_post_terms($post_id, 'categorie'); // Récupère les termes de la catégorie
    ?>

        <img class="photo-block__picture" src="<?php echo esc_url($photo_url); ?>" alt="<?php echo esc_attr($photo_alt); ?>">

        <div class="photo-overlay">
            <!-- TODO Actions possible on hover - ajouter le lien pour ouvrir la lightbox -->

            <a href="<?php echo get_permalink($post_id); ?>" class="photo-details">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-eye.svg" alt="Voir détails de la photo">
            </a>
            <!-- TODO Ici tu pourras ajouter le lien pour ouvrir la lightbox -->
            <!--<a href="#" class="photo-fullscreen"> -->
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-fullscreen.svg" alt="Voir la photo en taille réelle" class="photo-fullscreen">
              <!--</a> -->
        </div>

            <!-- TODO Additionnal information about the photo on hover -->
        <div class="photo-overlay__info">
            <div class="photo-overlay__reference">
                <span><?php echo esc_html($reference); ?></span>
            </div> 

            <div class="photo-overlay__category">
                <?php foreach ($categorie_terms as $term): ?>
                    <span><?php echo esc_html($term->name); ?></span>
                <?php endforeach; ?>
             </div>        
        </div>





    <?php } ?>
</div>
