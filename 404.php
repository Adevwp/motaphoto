<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
	<header class="page-header alignwide">
		<h2 class="page-title"><?php esc_html_e( 'Ce que vous cherchez n\'est pas ici', 'twentytwentyone' ); ?></h2>
	</header><!-- .page-header -->

	<div class="error-404 not-found default-max-width">
		<div class="page-content">
			<p><?php esc_html_e( 'Désolée, nous n\'avons pas trouvée la page que vous cherchez !', 'twentytwentyone' ); ?></p>
		</div><!-- .page-content -->
	</div><!-- .error-404 -->

<?php
get_footer();
