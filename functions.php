<?php 

// TO DO Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// TO DO Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

// Adding the theme
function mototheme_enqueue_styles() {
  // Add style  
  wp_enqueue_style('style-css', get_template_directory_uri() . '/assets/css/style.css');
  // Add scripts
  wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/script.js', array(), get_bloginfo('version'), true );
}
add_action('wp_enqueue_scripts', 'mototheme_enqueue_styles');

register_nav_menus( array(
	'main' => 'Menu Principal',
	'footer' => 'Menu Bas de page',
  ) 
);


// WP-Query For Single-Photo Navigation Interaction  TODO corriger

/**requête WP_Query pour navigation single-photo */
function motaphoto_request_photoMiniature($order) {
  // Validation de $order pour s'assurer qu'elle contient 'DESC' ou 'ASC'
  $order = in_array($order, ['DESC', 'ASC']) ? $order : 'DESC';

  // Arguments de base pour la requête
  $args = array(
      'post_type' => 'photo', 
      'posts_per_page' => 1, 
      'meta_key' => 'annee',  
      'orderby' => 'meta_value_num', 
      'order' => $order,
   );

  // Exécute la requête
  $query = new WP_Query($args);

  // Initialise la réponse
  $response = [];

  // Si la requête a des posts, récupère le nécessaire
  if ($query->have_posts()) {
      while ($query->have_posts()) {
          $query->the_post();
          $photo_id = get_field('photo');
          if ($photo_id) {
              $response['img'] = wp_get_attachment_image_url($photo_id, 'thumbnail');
              $response['url'] = get_permalink();
          }
      }
  } else {
      // Si aucun post n'est trouvé (premier ou dernier), chercher l'opposé
      $args['order'] = $order == 'DESC' ? 'ASC' : 'DESC'; // Inverse l'ordre
      $query = new WP_Query($args);

      if ($query->have_posts()) {
          while ($query->have_posts()) {
              $query->the_post();
              $photo_id = get_field('photo');
              if ($photo_id) {
                  $response['img'] = wp_get_attachment_image_url($photo_id, 'thumbnail');
                  $response['url'] = get_permalink();
              }
          }
      } else {
          $response = false;
      }
  }

  wp_reset_postdata();
  return $response;
}



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