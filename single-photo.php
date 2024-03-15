<?php get_header(); ?>

<!-- START OF MAIN-->
<main id="primary" class="site-main">

<?php
    // Get Taxonomy creat with ACF 
    $reference = get_field('reference');
    $type = get_field('type');
    $year = get_the_date('Y'); 
    $photo_id = get_field('photo');
?>


<div class="single-photo">
    <section class="single-photo-info">   <!-- TODO À METTRE À JOUR single-photo-container -->  
   
        <div class="single-photo-info_content"> <!-- TODO À METTRE À JOUR single-photo__info-->  

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    
                <h2><?php the_title(); ?></h2>
         
                <?php if (!empty($reference) && !is_wp_error($reference)) {
                    echo '<p class="single-photo-info_reference"> Référence : <span id="reference">' . esc_html($reference) . '</span></p>';
                } ?>

                <?php
                    $taxoCategorie = get_the_terms(get_the_ID(), 'categorie'); // Get the taxonomy category
                    if ($taxoCategorie && !is_wp_error($taxoCategorie)) {
                        echo '<p class="single-photo-info_categorie">Catégorie : ';
                        foreach ($taxoCategorie as $taxoCategorie) {
                            echo  $taxoCategorie->name . '';
                        }
                        echo '</p>';
                } ?>

                <?php
                $taxoFormat = get_the_terms(get_the_ID(), 'format'); // Get the taxonomy format
                if ($taxoFormat && !is_wp_error($taxoFormat)) {
                    echo '<p class="single-photo-info_format">Format : ';
                    foreach ($taxoFormat as $taxoFormat) {
                        echo esc_html($taxoFormat->name) . '';
                    }
                    echo '</p>';
                } ?>

               
                <?php if (!empty($type) && !is_wp_error($type)) {
                    echo '<p class="single-photo-info_type"> Type : ' . esc_html($type) . '</p>';
                } ?>


                <?php 
                if (!empty($year) && !is_wp_error($year)) { // Get the custom field year
                    echo '<p class="single-photo-info_annee">Année : ' . esc_html($year) . '</p>';
                }
                ?>

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
    
        </section>

    <section class="single-photo-interaction"> <!-- TODO À METTRE À JOUR  -->  
        <div class="single-photo-interaction__contact"> <!-- TODO .interesse -->
            <p> Cette photo vous intéresse?</p><!-- TODO #single-contact -->
            <button id="single-photo-interaction__contact_btn" type="button">Contact</button>
        </div>
        <div class="single-photo-interaction__navigation"> <!-- TODO .navigation -->
            <div class="navigation-card"> <!-- TODO .miniature -->
                <div class="navigation-card-photo"> <!-- TODO .miniature-photo - class non utilisee on lma garde ? -->
                    <!-- TODO .miniature-prev -->    
                    <?php $prev_photo = motaphoto_get_adjacent_photo(get_the_ID(), 'prev'); ?>

                     <?php if ($prev_photo) { ?>
                        <a href="<?php echo $prev_photo['url'] ?>">
                            <img class="navigation-card-left" src="<?php echo $prev_photo['img'] ?>">
                        </a> 
                    <?php } ?>
                   
                    <!-- TODO .miniature-next -->

                    <?php $next_photo = motaphoto_get_adjacent_photo(get_the_ID(), 'next'); ?>
                    <?php if ($next_photo) { ?>
                        <a href="<?php echo $next_photo['url'] ?>">
                            <img class="navigation-card-right" src="<?php echo $next_photo['img'] ?>">
                        </a> 
                    <?php } ?>
                </div>
                <div class="navigation-card-arrow"> <!-- TODO .miniature-fleche -->
                   
                <!-- TODO .arrow-prev -->
                    <?php $prev_photo = motaphoto_get_adjacent_photo(get_the_ID(), 'prev'); ?>
                    <?php if ($prev_photo) { ?>
                        <a href="<?php echo $prev_photo['url'] ?>">
                            <img class="arrow-left" src="<?php echo get_template_directory_uri() . '\assets\images\arrow-left.svg'; ?> " alt="Photo précédente">
                        </a> 
                    <?php } ?> 
                    
                    <!-- TODO .arrow-next -->
                    <?php $next_photo = motaphoto_get_adjacent_photo(get_the_ID(), 'next'); ?>
                    <?php if ($next_photo) { ?>
                        <a href="<?php echo $next_photo['url'] ?>">
                            <img class="arrow-right" src="<?php echo get_template_directory_uri() . '\assets\images\arrow-right.svg'; ?> " alt="Photo suivante">
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
                    </section>
    
    <!-- TODO RELATED PHOTOS -->
    <section class="related-photos-section">
        <h3>VOUS AIMEREZ AUSSI</h3>
        <div class="related-photos">
        <?php
            $term_list = wp_get_post_terms($post->ID, 'categorie', array("fields" => "ids"));
            $related_args = array(
                'post_type' => 'photo',
                'posts_per_page' => 2, // Limit to 2 pictures related 
                'post__not_in' => array($post->ID), // Excludes current photo
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
                    get_template_part('template-parts/photo-block', null, array('post_id' => get_the_ID()));

                }
                wp_reset_postdata();
            }
            else { 
            echo '<p>Aucune autre photo trouvée dans cette catégorie.</p>';}

        ?>
        </div>  
    </section>
</div>


</main>

<!-- START OF FOOTER-->

<?php get_footer(); ?>