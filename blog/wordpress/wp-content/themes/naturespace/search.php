<?php
/**
 * The search results template file.
 * @package NatureSpace
 * @since NatureSpace 1.0.0
*/
get_header(); ?>
<div id="wrapper-content">
<?php if ( have_posts() ) : ?>
  <div class="container">
  <div id="main-content">
    <div class="content-headline">
      <h1 class="entry-headline"><?php printf( __( 'Search Results for: %s', 'naturespace' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
<?php naturespace_get_breadcrumb(); ?>
    </div>
    <div id="content"> 
<p class="number-of-results"><?php _e( '<strong>Number of Results</strong>: ', 'naturespace' ); ?><?php echo $wp_query->found_posts; ?></p>
      <div<?php if ($naturespace_options_db['naturespace_post_entry_format'] == 'Grid - Masonry') { ?> class="js-masonry"<?php } ?>>
<?php while (have_posts()) : the_post(); ?>      
<?php if ($naturespace_options_db['naturespace_post_entry_format'] == 'Grid - Masonry') {
get_template_part( 'content', 'grid' ); } else {
get_template_part( 'content', 'archives' ); } ?>
<?php endwhile; ?>
      </div>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation" role="navigation">
			<h2 class="navigation-headline section-heading"><?php _e( 'Search results navigation', 'naturespace' ); ?></h2>
      <div class="nav-wrapper">
        <p class="navigation-links">
<?php $big = 999999999;
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
  'prev_text' => __( '&larr; Previous', 'naturespace' ),
	'next_text' => __( 'Next &rarr;', 'naturespace' ),
	'total' => $wp_query->max_num_pages,
	'add_args' => false
) );
?>
        </p>
      </div>
		</div>
<?php endif; ?>

<?php else : ?>
  <div class="container">
  <div id="main-content">
    <div class="content-headline">
      <h1 class="entry-headline"><?php _e( 'Nothing Found', 'naturespace' ); ?></h1>
<?php naturespace_get_breadcrumb(); ?>
    </div>
    <div id="content">
    <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'naturespace' ); ?></p><?php get_search_form(); ?>
<?php endif; ?>
    </div> <!-- end of content -->
  </div>
<?php if ($naturespace_options_db['naturespace_display_sidebar_archives'] != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php } ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>