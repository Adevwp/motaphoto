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
                echo '<p class="noresult">Aucune photo trouvée.</p>';
            }
            ?>
        </div>

        <div class="hero-header__title">
            <h1>PHOTOGRAPHE EVENT</h1>
        </div>
    </div>
 
<!-- FILTER AND SELECT -->    
    <section class="filter-section">
        <!-- Filter by taxonomy and custom field -->       
        <div class="filter-section__photo-select">
            <!-- Filter by category -->
            <select id="photo-category-select">
                <option value="">Catégories</option>
                <?php $categories = get_terms('categorie'); ?>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo esc_attr($category->slug); ?>"><?php echo esc_html($category->name); ?></option>
                <?php endforeach; ?>
            </select>

            <!-- Filter by format -->
            <select id="photo-format-select">
                <option value="">Formats</option>
                <?php $formats = get_terms('format'); ?>
                <?php foreach ($formats as $format): ?>
                    <option value="<?php echo esc_attr($format->slug); ?>"><?php echo esc_html($format->name); ?></option>
                <?php endforeach; ?>
            </select>
        </div>  

        <!-- Sort by date -->
        <select id="filter-section_date-sort">
            <option value="">Trier par</option>
            <option value="DESC">À partir des plus récentes</option>
            <option value="ASC">À partir des plus anciennes</option>
        </select>
    </section>


<!-- PHOTOS LIST-->

    <section id="photos-list" class="photos-list-container" >      <!-- TODO old thumbnail-container / ou photo-catalogue -->
        <?php
            // Arguments de la requête WP_Query pour récupérer les articles de type 'photo' TODO
            $args = array(
                'post_type' => 'photo',
            );

            // Initialiser la requête WP_Query avec les arguments définis TOdo
            $query = new WP_Query( $args );
        
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    get_template_part('template-parts/photo-block', null, array('post_id' => get_the_ID()));

                }
                wp_reset_postdata();
            }

            else { 
            echo '<p class="noresult">Aucune autre photo trouvée dans cette catégorie.</p>';}
        ?>
                
    </section>

<!-- BUTTON LOAD MORE-->
    <div class="loadmore-photo-button">    <!-- // todo class="photo-catalogue-boutton" -->
        <button id="loadmore-btn" type="button">Charger plus</button> 
    </div>


</main>

<?php get_footer();?>
