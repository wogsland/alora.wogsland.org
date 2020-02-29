<?php
/**
 * The template for displaying content of post entries as Grid - Masonry.
 * @package NatureSpace
 * @since NatureSpace 1.0.0
*/
?>
<?php global $naturespace_options_db; ?>
      <article <?php post_class('grid-entry'); ?>>
      <div class="grid-entry-inner">
<?php if ( has_post_thumbnail() ) { ?>
        <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
<?php } ?>
        <h2 class="grid-entry-headline"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php if ( $naturespace_options_db['naturespace_display_meta_post_entry'] != 'Hide' ) { ?>
        <p class="post-meta">
          <span class="post-info-author"><i class="icon_pencil-edit" aria-hidden="true"></i> <?php the_author_posts_link(); ?></span>
          <span class="post-info-date"><i class="icon_clock_alt" aria-hidden="true"></i> <a href="<?php echo get_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
<?php if ( comments_open() ) { ?>
          <span class="post-info-comments"><i class="icon_comment_alt" aria-hidden="true"></i> <a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></span>
<?php } ?>
<?php if ( has_category() ) { ?>
          <span class="post-info-category"><i class="icon_folder-alt" aria-hidden="true"></i> <?php the_category(', '); ?></span>
<?php } ?>
<?php if ( has_tag() ) { ?>
<?php the_tags( '<span class="post-info-tags"><i class="icon_tag_alt" aria-hidden="true"></i> ', ', ', '</span>' ); ?>
<?php } ?>
        </p>
<?php } ?>
<?php if ( $naturespace_options_db['naturespace_content_archives'] != 'Content' ) { ?>
<?php the_excerpt(); ?>
<?php } else { ?>
<?php global $more; $more = 0; ?><?php the_content(); ?>
<?php } ?> 
      </div>
      </article>