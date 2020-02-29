<?php
/**
 * The main template file.
 * @package NatureSpace
 * @since NatureSpace 1.0.0
*/
get_header(); ?>
<div id="wrapper-content">
  <div class="container">
  <div id="main-content">
<?php if ( $naturespace_options_db['naturespace_display_site_description'] != 'Hide' ) { ?>
    <div class="content-headline">
      <h1 class="entry-headline"><?php bloginfo( 'description' ); ?></h1>
    </div>
<?php } ?>
    <section class="home-latest-posts<?php if ($naturespace_options_db['naturespace_post_entry_format'] == 'Grid - Masonry') { ?> js-masonry<?php } ?>">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php if ($naturespace_options_db['naturespace_post_entry_format'] == 'Grid - Masonry') {
get_template_part( 'content', 'grid' ); } else {
get_template_part( 'content', 'archives' ); } ?>
<?php endwhile; endif; ?>
    </section>  
<?php naturespace_content_nav( 'nav-below' ); ?> 
  </div>
<?php if ($naturespace_options_db['naturespace_display_sidebar_archives'] != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php } ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>