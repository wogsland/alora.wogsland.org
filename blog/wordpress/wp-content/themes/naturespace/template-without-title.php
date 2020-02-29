<?php
/**
 * Template Name: Page without Title
 * The template file for pages without the page title.
 * @package NatureSpace
 * @since NatureSpace 1.0.0
*/
get_header(); ?>
<div id="wrapper-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="container">
  <div id="main-content">
    <div id="content">
<?php naturespace_get_breadcrumb(); ?>
<?php naturespace_get_display_image_page(); ?> 
      <div class="entry-content">
<?php the_content(); ?>
<?php edit_post_link( __( '(Edit)', 'naturespace' ), '<p>', '</p>' ); ?>
<?php wp_link_pages( array( 'before' => '<p class="page-link"><span>' . __( 'Pages:', 'naturespace' ) . '</span>', 'after' => '</p>' ) ); ?>
      </div>
<?php endwhile; endif; ?>
<?php comments_template( '', true ); ?>
    </div> <!-- end of content -->
  </div>
<?php if ($naturespace_options_db['naturespace_display_sidebar'] != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php } ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>