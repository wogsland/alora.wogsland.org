<?php 
/**
 * Library of Theme options functions.
 * @package NatureSpace
 * @since NatureSpace 1.0.0
*/

// Display Breadcrumb navigation
function naturespace_get_breadcrumb() { 
global $naturespace_options_db;
		if ($naturespace_options_db['naturespace_display_breadcrumb'] != 'Hide') { ?>
		<?php if(function_exists( 'bcn_display' ) && !is_front_page()){ _e('<p class="breadcrumb-navigation">', 'naturespace'); ?><?php bcn_display(); ?><?php _e('</p>', 'naturespace');} ?>
<?php } 
} 

// Display featured images on single posts
function naturespace_get_display_image_post() { 
global $naturespace_options_db;
		if ($naturespace_options_db['naturespace_display_image_post'] == '' || $naturespace_options_db['naturespace_display_image_post'] == 'Display') { ?>
		<?php if ( has_post_thumbnail() ) : ?>
      <?php the_post_thumbnail(); ?>
    <?php endif; ?>
<?php } 
}

// Display featured images on pages
function naturespace_get_display_image_page() { 
global $naturespace_options_db;
		if ($naturespace_options_db['naturespace_display_image_page'] == '' || $naturespace_options_db['naturespace_display_image_page'] == 'Display') { ?>
		<?php if ( has_post_thumbnail() ) : ?>
      <?php the_post_thumbnail(); ?>
    <?php endif; ?>
<?php } 
} ?>