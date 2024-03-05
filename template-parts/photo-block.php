<div class="photo-block">
    <?php 
    // Récupère l'ID du post passé au template part
    $post_id = $args['post_id']; 

    // Assure-toi que l'ID est valide
    if ($post_id) {
        $photo_id = get_field('photo', $post_id); // Utilise get_field avec l'ID du post
        $photo_url = wp_get_attachment_image_url($photo_id, 'full');
        $photo_alt = get_post_meta($photo_id, '_wp_attachment_image_alt', true);
        ?>

        <img src="<?php echo esc_url($photo_url); ?>" alt="<?php echo esc_attr($photo_alt); ?>">

        <div class="photo-overlay">
            <a href="<?php echo get_permalink($post_id); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-eye.svg" alt="Voir détails">
            </a>
            <!-- Ici tu pourras ajouter le lien pour ouvrir la lightbox -->
            <a href="#" class="photo-fullscreen">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-fullscreen.svg" alt="Agrandir">
            </a>
        </div>
    <?php } ?>
</div>
