<?php 

// Add support for featured images
add_theme_support( 'post-thumbnails' );

// Add the title of each pages 
add_theme_support( 'title-tag' );

// Adding the theme
function mototheme_enqueue_styles() {
  global $wp_query;
  // Add style  
  wp_enqueue_style('style-css', get_template_directory_uri() . '/assets/css/style.css');
  // Add general scripts
  wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/script.js', array(), get_bloginfo('version'), true );
  // Add Ajax script only on the front page
  if (is_front_page()) {
    wp_enqueue_script('photo-catalogue-ajax', get_template_directory_uri() . '/assets/js/photo-catalogue-ajax.js', array('jquery'), null, true);
    wp_localize_script('photo-catalogue-ajax', 'photo_catalogue_ajax_params', array(
      'ajaxurl' => admin_url('admin-ajax.php'),
      'posts' => json_encode($wp_query->query_vars), // Transfère les vars de la requête initiale au JS
    ));
  }
    // Add script for the lightbox
    wp_enqueue_script('lightbox-js', get_stylesheet_directory_uri() . '/assets/js/lightbox-modal.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'mototheme_enqueue_styles');

register_nav_menus( array(
	'main' => 'Menu Principal',
	'footer' => 'Menu Bas de page',
  ) 
);

// WP-Query For Single-Photo Navigation Interaction  TODO corriger

function motaphoto_get_adjacent_photo($current_post_id, $direction = 'next') {
  $args = [
      'post_type'      => 'photo',
      'posts_per_page' => 1,
      'post_status'    => 'publish',
      'orderby'        => 'date',
      'order'          => $direction === 'next' ? 'ASC' : 'DESC',
      'post__not_in'   => [$current_post_id], // Exclure le post actuel todo
      'meta_query'     => [
          [
              'key'     => 'photo',
              'value'   => '',
              'compare' => '!=',
          ],
      ],
  ];

  if ($direction === 'next') {
      $args['date_query'] = ['after' => get_the_date('c', $current_post_id), 'inclusive' => false];
  } else {
      $args['date_query'] = ['before' => get_the_date('c', $current_post_id), 'inclusive' => false];
  }

  $query = new WP_Query($args);

  if (!$query->have_posts() && $direction === 'next') {
      // Si aucune photo suivante, retourner à la première photo todo
      $args['date_query'] = ['after' => '1900-01-01'];
      $query = new WP_Query($args);
  } elseif (!$query->have_posts() && $direction === 'prev') {
      // Si aucune photo précédente, aller à la dernière photo todo 
      unset($args['date_query']);
      $args['order'] = 'DESC';
      $query = new WP_Query($args);
  }

  if ($query->have_posts()) {
      $query->the_post();
      $photo_id = get_field('photo');
      $img_url = wp_get_attachment_image_url($photo_id, 'thumbnail');
      $url = get_permalink();
      wp_reset_postdata(); // Restore original Post Data
      return ['img' => $img_url, 'url' => $url];
  }

  return false;
}



// WP-Query For random Hero Header Photo 

function heroHeader_request_randomPhoto() 
{
    $args = array (
        'post_type' => 'photo', 
        'posts_per_page' => 1, 
        'post_status' => 'publish',
        'orderby' => 'rand',
    ); 

    $query = new WP_Query($args);
    $response = array();

    if($query->have_posts()){
        while ($query->have_posts()){
            $query->the_post(); 
            $photo_id = get_field('photo');          
            $image = wp_get_attachment_image_src($photo_id, 'full'); 
            $alt_text = get_post_meta($photo_id, '_wp_attachment_image_alt', true);

            $item = array(
                'img' => $image,
                'alt' => $alt_text,
            );
            $response[] = $item;   
           
        }
    } else {
        $response = false; 
    }
    wp_reset_postdata();
    return $response;
}


// AJAX to load more photos on Frontpage.php
function loadmore_photos_handler() {
  if (!isset($_POST['query']) || !isset($_POST['page'])) { //Verify if query and page exist in array
      wp_die(); // Stop script if they no exist 
  }

  $args = json_decode(stripslashes($_POST['query']), true); 
  // Use query, and stripslashes erase anti/ for special character, json_decode convert a chain JSON on PHP array
  // true = exist must be associative array not an object to process AJAX request
  $args['paged'] = intval($_POST['page']); 
  // Pages as page, intval() converts the value to an integer for paging with WP_QUERY
  $args['post_status'] = 'publish';
  $args['post_type'] = 'photo'; // Select post type 'photo'

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    ob_start(); // Démarre la temporisation de sortie ou buffer todo 
    while ($query->have_posts()) {
        $query->the_post();
        get_template_part('template-parts/photo-block', null, array('post_id' => get_the_ID()));
    }
    $content = ob_get_clean(); // Stocke le contenu capturé puis efface le tampon ou Récupère et nettoie le buffer todo
    wp_send_json_success(array('content' => $content)); // Envoie une réponse JSON positive avec le contenu todo 
} else {
    wp_send_json_error(array('message' => 'Toutes les photos ont été chargées.')); // Envoie une réponse JSON négative avec un message
  }


  wp_die(); // Stop Ajax Request 
}

add_action('wp_ajax_loadmore_photos', 'loadmore_photos_handler');
add_action('wp_ajax_nopriv_loadmore_photos', 'loadmore_photos_handler');


// AJAX TO FILTER PHOTO

function filter_photos_handler() {
  $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
  $format = isset($_POST['format']) ? sanitize_text_field($_POST['format']) : '';
  $order = isset($_POST['order']) ? sanitize_text_field($_POST['order']) : 'DESC';

  $args = [
      'post_type' => 'photo',
      'posts_per_page' => -1, // ou toute autre limite
      'orderby' => 'date',
      'order' => $order,
      'tax_query' => []
  ];

  if (!empty($category)) {
      $args['tax_query'][] = [
          'taxonomy' => 'categorie',
          'field' => 'slug',
          'terms' => $category
      ];
  }

  if (!empty($format)) {
      $args['tax_query'][] = [
          'taxonomy' => 'format',
          'field' => 'slug',
          'terms' => $format
      ];
  }

  $query = new WP_Query($args);
  ob_start();

  if ($query->have_posts()) {
      while ($query->have_posts()) {
          $query->the_post();
          get_template_part('template-parts/photo-block', null, array('post_id' => get_the_ID()));
      }
  } else {
      echo '<p class="noresult">Aucune photo trouvée.</p>';
  }

  $content = ob_get_clean();
  wp_send_json_success(array('content' => $content));

  wp_die();
}

add_action('wp_ajax_filter_photos', 'filter_photos_handler');
add_action('wp_ajax_nopriv_filter_photos', 'filter_photos_handler');




/* TODO mettre au propore option optmisation Green code */
// Optimize page loading by disabling autoloading of global styles and SVG filters
function custom_wp_remove_global_css() {
  remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
  remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
}
add_action( 'init', 'custom_wp_remove_global_css' );

// Disable Emojis in WordPress
function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
  add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );
   
/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } 
  else {
    return array();
  }
}
   
/**
* Remove emoji CDN hostname from DNS prefetching hints.
*
* @param array $urls URLs to print for resource hints.
* @param string $relation_type The relation type the URLs are printed for.
* @return array Difference betwen the two arrays.
*/
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
  if ( 'dns-prefetch' == $relation_type ) {
    /** This filter is documented in wp-includes/formatting.php */
    $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
    $urls = array_diff( $urls, array( $emoji_svg_url ) );
  }
  return $urls;
}