<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package testival
 */

get_header();
?>

<div class="utility-page-wrap">
    <div class="utility-page-content"><img src="<?php echo get_template_directory_uri() ?>/assets/img/not-found.svg" alt="" class="image-3">
        <h2 class="heading"><?php esc_html_e( 'Page Not Found', 'testival' ); ?></h2>
        <div class="text-block"><?php esc_html_e( "The page you are looking for doesn't exist or has been moved", 'testival' ); ?></div>
    </div>
</div>
