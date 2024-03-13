<?php get_header(); ?>

<!-- START OF MAIN-->
<main id="primary" class="site-main">

  <!-- HERO HEADER -->
    <div class="hero-header">
        <div class="hero-header__image">
            <?php
            $randomPhoto = heroHeader_request_randomPhoto(); // $photoHero = motaphoto_request_photoHero(); todo

            if ($randomPhoto && is_array($randomPhoto) && !empty($randomPhoto)) {
                foreach ($randomPhoto as $photo) { // ($photoHero as $photo) todo
                    $image = $photo['img'][0]; 
                    $alt = $photo['alt'];
                    echo '<img class="photo_hero" src="' . esc_url($image) . '" alt="' . esc_attr($alt) . '" >';
                } // class="image_hero" todo
            } else {
                echo 'Aucune photo trouvée.';
            }
            ?>
        </div>

        <div class="hero-header__title">
            <h1>PHOTOGRAPHE EVENT</h1>
        </div>
    </div>
 
<!-- FILTER AND SELECT -->    



<!-- PHOTOS LIST-->

<div class="main-page">
        <!-- Conteneur pour les miniatures des photos -->

     <div class="thumbnail-container" id="photos-list">
        <?php
            // Arguments de la requête WP_Query pour récupérer les articles de type 'photo' TODO
            $args = array(
                'post_type' => 'photo',
            );

            // Initialiser la requête WP_Query avec les arguments définis //
            $query = new WP_Query( $args );
        
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    get_template_part('template-parts/photo-block', null, array('post_id' => get_the_ID()));

                }
                wp_reset_postdata();
            }

            else { 
            echo '<p>Aucune autre photo trouvée dans cette catégorie.</p>';}
        ?>
              
    </div>
</div>

<!-- BUTTON LOAD MORE-->
    <div class="loadmore-photo-button">    <!-- // todo class="photo-catalogue-boutton" -->
        <button id="loadmore-btn" type="button">Charger plus</button> 
    </div>


</main>

<!-- START OF FOOTER-->
<?php get_footer();?>
