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

    <div class="single-photo-interaction"> <!-- TODO À METTRE À JOUR  -->  
        <div class="single-photo-interaction__contact"> <!-- TODO .interesse -->
            <p> Cette photo vous intéresse?</p><!-- TODO #single-contact -->
            <button id="single-photo-interaction__contact_btn" type="button">Contact</button>
        </div>
        <div class="single-photo-interaction__navigation"> <!-- TODO .navigation -->
            <div class="miniature">
                <div class="miniature-photo">
                    <?php $prev = motaphoto_request_photoMiniature('ASC'); ?>
                    <?php if ($prev) { ?>
                        <a href="<?php echo $prev['url'] ?>">
                            <img class="miniature-prev" src="<?php echo $prev['img'][0] ?>">
                        </a>
                    <?php } ?>

                    <?php $next = motaphoto_request_photoMiniature('DESC'); ?>
                    <?php if ($next) { ?>
                        <a href="<?php echo $next['url'] ?>">
                            <img class="miniature-next" src="<?php echo $next['img'][0] ?>">
                        </a>
                    <?php } ?>
                </div>
                <div class="miniature-fleche">
                    <?php $prev = motaphoto_request_photoMiniature('ASC'); ?>
                    <?php if ($prev) { ?>
                        <a href="<?php echo $prev['url'] ?>">
                            <img class="arrow-prev" src="<?php echo get_template_directory_uri() . '\assets\images\arrow-left.svg'; ?> " alt="Photo précédente">
                        </a>
                    <?php } ?>

                    <?php $next = motaphoto_request_photoMiniature('DESC'); ?>
                    <?php if ($next) { ?>
                        <a href="<?php echo $next['url'] ?>">
                            <img class="arrow-next" src="<?php echo get_template_directory_uri() . '\assets\images\arrow-right.svg'; ?> " alt="Photo suivante">
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- TODO Photo apparentée  -->
    <div>
        <?php
            $term_list = wp_get_post_terms($post->ID, 'categorie', array("fields" => "ids"));
            $related_args = array(
                'post_type' => 'photo',
                'posts_per_page' => 2, // Limite à deux photos apparentées
                'post__not_in' => array($post->ID), // Exclut la photo courante
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categorie',
                        'field' => 'id',
                        'terms' => $term_list
                    )
                )
            );

            $related_query = new WP_Query($related_args);

            if ($related_query->have_posts()) {
                while ($related_query->have_posts()) {
                    $related_query->the_post();
                    $photo_url = get_field('photo_url'); // Remplacer par le nom réel de ton custom field
                    $photo_alt = get_post_meta(get_field('photo'), '_wp_attachment_image_alt', true);
                    // Inclusion du template pour chaque photo
                    include(locate_template('/template-parts/photo-block.php'));
                }
                wp_reset_postdata();
            }
        ?>

    </div>

</div>


<?php get_footer(); ?>