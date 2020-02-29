<?php
/**
 * Template Name: Full Width
 * The template file for pages without the right sidebar.
 * @package NatureSpace
 * @since NatureSpace 1.0.0
*/
get_header(); ?>
<div id="wrapper-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="container">
  <div id="main-content">
    <div id="content">
      <div class="content-headline">
        <h1 class="entry-headline"><?php the_title(); ?></h1>
<?php naturespace_get_breadcrumb(); ?>
      </div>
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
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>