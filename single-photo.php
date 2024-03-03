<?php get_header(); ?>

<?php
    // Get Taxonomy creat with ACF 
    $reference = get_field('reference');
    $type = get_field('type');
    $year = get_field('annee'); 
    $photo_id = get_field('photo');
?>


<div class="single-photo">
    <div class="single-photo-info">   <!-- TODO À METTRE À JOUR single-photo-container -->  
   
        <div class="single-photo-info_content"> <!-- TODO À METTRE À JOUR single-photo__info-->  

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    
                <h2><?php the_title(); ?></h2>

                <?php if ($reference) {
                        echo '<p class="description_photo"> Référence : <span id="reference">' . $reference . '</span></p>';
                } ?>

                <?php
                    // TODO Récupérer les termes de la taxonomie pour le CPT actuel
                    $taxoCategorie = get_the_terms(get_the_ID(), 'categorie');
                    if ($taxoCategorie && !is_wp_error($taxoCategorie)) {
                        echo '<p class="description_photo">Catégorie : ';
                        foreach ($taxoCategorie as $taxoCategorie) {
                            echo '<a href="' . get_term_link($taxoCategorie) . '">' . $taxoCategorie->name . '</a> ';
                        }
                        echo '</p>';
                } ?>

                <?php
                $taxoFormat = get_the_terms(get_the_ID(), 'format');
                if ($taxoFormat && !is_wp_error($taxoFormat)) {
                    echo '<p class="description_photo">Format : ';
                    foreach ($taxoFormat as $taxoFormat) {
                        echo '<a href="' . get_term_link($taxoFormat) . '">' . $taxoFormat->name . '</a> ';
                    }
                    echo '</p>';
                } ?>

                <?php if ($type) {
                    echo '<p class="description_photo"> Type : ' . $type . '</p>';
                } ?>

                <?php if ($year) {
                    echo '<p class="description_photo">Année : ' . date('Y', strtotime($year)) . '</p>';
                } ?>

                <?php endwhile;
            endif; ?>
        </div>

        <div class="single-photo-info__image"> <!-- TODO À METTRE À JOUR single-photo__image -->  

            <?php 
                if ($photo_id) {
                    // Utilise l'ID pour obtenir l'URL de l'image
                    $photo_url = wp_get_attachment_image_url($photo_id, 'full');

                    // Récupère le texte alternatif
                    $photo_alt = get_post_meta($photo_id, '_wp_attachment_image_alt', true);

                    // Affiche l'image
                    echo '<img src="' . esc_url($photo_url) . '" alt="' . esc_attr($photo_alt) . '" />';
            }?>

       
    </div>
    
    </div>
</div>


<?php get_footer(); ?>