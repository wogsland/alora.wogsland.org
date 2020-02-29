<?php
/**
 * NatureSpace functions and definitions.
 * @package NatureSpace
 * @since NatureSpace 1.0.0
*/

/**
 * NatureSpace theme variables.
 *  
*/    
$naturespace_themename = "NatureSpace";			//Theme Name
$naturespace_themever = "1.1.3";									//Theme version
$naturespace_shortname = "naturespace";							//Shortname 
$naturespace_manualurl = get_template_directory_uri() . '/docs/documentation.html';	//Manual Url
// Set path to NatureSpace Framework and theme specific functions
$naturespace_be_path = get_template_directory() . '/functions/be/';									//BackEnd Path
$naturespace_fe_path = get_template_directory() . '/functions/fe/';									//FrontEnd Path 
$naturespace_be_pathimages = get_template_directory_uri() . '/functions/be/images';		//BackEnd Path
$naturespace_fe_pathimages = get_template_directory_uri() . '';	//FrontEnd Path
//Include Framework [BE] 
require_once ($naturespace_be_path . 'fw-options.php');	 	 // Framework Init  
// Include Theme specific functionality [FE] 
require_once ($naturespace_fe_path . 'headerdata.php');		 // Include css and js
require_once ($naturespace_fe_path . 'library.php');	       // Include library, functions

/**
 * NatureSpace theme basic setup.
 *  
*/
function naturespace_setup() {
	// Makes NatureSpace available for translation.
	load_theme_textdomain( 'naturespace', get_template_directory() . '/languages' );
  // This theme styles the visual editor to resemble the theme style.
	$naturespace_font_url = add_query_arg( 'family', 'Open+Sans', "//fonts.googleapis.com/css" );
	add_editor_style( array( 'editor-style.css', $naturespace_font_url ) );
	// Adds RSS feed links to <head> for posts and comments.  
	add_theme_support( 'automatic-feed-links' );
	// This theme supports custom background color and image.
	$defaults = array(
	'default-color' => '', 
  'default-image' => '',
	'wp-head-callback'  => '_custom_background_cb',
	'admin-head-callback' => '',
	'admin-preview-callback' => '' );  
  add_theme_support( 'custom-background', $defaults );
	// This theme supports post thumbnails.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1170, 9999 );
  // This theme supports a custom header image.
  $args = array(
	'width' => 1800,
  'flex-width' => true,
  'flex-height' => true,
  'header-text' => false,
  'random-default' => true,);
  add_theme_support( 'custom-header', $args );
  // This theme supports the WooCommerce plugin.
  add_theme_support( 'woocommerce' );
  global $content_width;
  if ( ! isset( $content_width ) ) { $content_width = 840; }
}
add_action( 'after_setup_theme', 'naturespace_setup' );

/**
 * Enqueues scripts and styles for front-end.
 *
*/
function naturespace_scripts_styles() {
	global $wp_styles, $naturespace_options_db; 
	// Adds JavaScript
	  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' ); 
    if ( $naturespace_options_db['naturespace_post_entry_format'] == 'Grid - Masonry' ) {
    if ( is_home() || is_archive() || is_search() ) { 
    wp_enqueue_script( 'jquery-masonry', array( 'jquery' ) );
    if ( !is_rtl() ) {
    wp_enqueue_script( 'naturespace-masonry-settings', get_template_directory_uri() . '/js/masonry-settings.js', array(), '1.0', true ); } else {
    wp_enqueue_script( 'naturespace-masonry-settings-rtl', get_template_directory_uri() . '/js/masonry-settings-rtl.js', array(), '1.0', true ); }}}
    wp_enqueue_script( 'naturespace-placeholders', get_template_directory_uri() . '/js/placeholders.js', array(), '2.1.0', true );
    wp_enqueue_script( 'naturespace-scroll-to-top', get_template_directory_uri() . '/js/scroll-to-top.js', array( 'jquery' ), '1.0', true );
    if ( has_nav_menu( 'main-navigation' ) && $naturespace_options_db['naturespace_header_layout'] == 'Centered' && !is_page_template('template-landing-page.php') ) {
    wp_enqueue_script( 'naturespace-menubox', get_template_directory_uri() . '/js/menubox.js', array(), '1.0', true ); }
    wp_enqueue_script( 'naturespace-selectnav', get_template_directory_uri() . '/js/selectnav.js', array(), '0.1', true );
    wp_enqueue_script( 'naturespace-responsive', get_template_directory_uri() . '/js/responsive.js', array(), '1.0', true );
    // Adds CSS
    wp_enqueue_style( 'naturespace-elegantfont', get_template_directory_uri() . '/css/elegantfont.css' );  
	  wp_enqueue_style( 'naturespace-style', get_stylesheet_uri() );   
    wp_enqueue_style( 'naturespace-google-font-default', '//fonts.googleapis.com/css?family=Open+Sans&amp;subset=latin,latin-ext,cyrillic' );
    if ( class_exists( 'woocommerce' ) ) { wp_enqueue_style( 'naturespace-woocommerce-custom', get_template_directory_uri() . '/css/woocommerce-custom.css' ); }
}
add_action( 'wp_enqueue_scripts', 'naturespace_scripts_styles' );

/**
 * Creates a nicely formatted and more specific title element text.
 *  
*/
function naturespace_wp_title( $title, $sep ) {
	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	return $title;
}
add_filter( 'wp_title', 'naturespace_wp_title', 10, 2 );

/**
 * Register our menu.
 *
 */
function naturespace_register_my_menu() {
  register_nav_menu( 'main-navigation', __( 'Main Header Menu', 'naturespace' ) ); 
}
add_action( 'after_setup_theme', 'naturespace_register_my_menu' );

/**
 * Register our sidebars and widgetized areas.
 *
*/
function naturespace_widgets_init() {
  register_sidebar( array(
		'name' => __( 'Right Sidebar', 'naturespace' ),
		'id' => 'sidebar-1',
		'description' => __( 'Right sidebar which appears on all posts and pages.', 'naturespace' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => ' <p class="sidebar-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer left widget area', 'naturespace' ),
		'id' => 'sidebar-2',
		'description' => __( 'Left column with widgets in footer.', 'naturespace' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer middle widget area', 'naturespace' ),
		'id' => 'sidebar-3',
		'description' => __( 'Middle column with widgets in footer.', 'naturespace' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer right widget area', 'naturespace' ),
		'id' => 'sidebar-4',
		'description' => __( 'Right column with widgets in footer.', 'naturespace' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer notices', 'naturespace' ),
		'id' => 'sidebar-5',
		'description' => __( 'The line for copyright and other notices below the footer widget areas. Insert here one Text widget. The "Title" field at this widget should stay empty.', 'naturespace' ),
		'before_widget' => '<div class="footer-signature"><div class="footer-signature-content">',
		'after_widget' => '</div></div>',
		'before_title' => '',
		'after_title' => '',
	) );
}
add_action( 'widgets_init', 'naturespace_widgets_init' );

/**
 * Post excerpt settings.
 *
*/
function naturespace_custom_excerpt_length( $length ) {
return 40;
}
add_filter( 'excerpt_length', 'naturespace_custom_excerpt_length', 20 );
function naturespace_new_excerpt_more( $more ) {
global $post;
return '&hellip; <br /><a class="read-more-button" href="'. esc_url( get_permalink($post->ID) ) . '">' . __( 'Read more', 'naturespace' ) . '</a>';}
add_filter( 'excerpt_more', 'naturespace_new_excerpt_more' );

if ( ! function_exists( 'naturespace_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
*/
function naturespace_content_nav( $html_id ) {
	global $wp_query;
	$html_id = esc_attr( $html_id );
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h2 class="navigation-headline section-heading"><?php _e( 'Post navigation', 'naturespace' ); ?></h2>
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
	<?php endif;
}
endif;

/**
 * Displays navigation to next/previous posts on single posts pages.
 *
*/
function naturespace_prev_next($nav_id) { ?>
<?php $naturespace_previous_post = get_adjacent_post( false, "", true );
$naturespace_next_post = get_adjacent_post( false, "", false ); ?>
<div id="<?php echo $nav_id; ?>" class="navigation" role="navigation">
	<div class="nav-wrapper">
<?php if ( !empty($naturespace_previous_post) ) { ?>
  <p class="nav-previous"><a href="<?php echo esc_url(get_permalink($naturespace_previous_post->ID)); ?>" title="<?php echo esc_attr($naturespace_previous_post->post_title); ?>"><?php _e( '&larr; Previous post', 'naturespace' ); ?></a></p>
<?php } if ( !empty($naturespace_next_post) ) { ?>
	<p class="nav-next"><a href="<?php echo esc_url(get_permalink($naturespace_next_post->ID)); ?>" title="<?php echo esc_attr($naturespace_next_post->post_title); ?>"><?php _e( 'Next post &rarr;', 'naturespace' ); ?></a></p>
<?php } ?>
   </div>
</div>
<?php }

if ( ! function_exists( 'naturespace_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
*/
function naturespace_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'naturespace' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'naturespace' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<span><b class="fn">%1$s</b> %2$s</span>',
						get_comment_author_link(),
						( $comment->user_id === $post->post_author ) ? '<span>' . __( '(Post author)', 'naturespace' ) . '</span>' : ''
					);
					printf( '<time datetime="%2$s">%3$s</time>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						// translators: 1: date, 2: time
						sprintf( __( '%1$s at %2$s', 'naturespace' ), get_comment_date(''), get_comment_time() )
					);
				?>
			</div><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'naturespace' ); ?></p>
			<?php endif; ?>

			<div class="comment-content comment">
				<?php comment_text(); ?>
			 <div class="reply">
			   <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'naturespace' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
			   <?php edit_comment_link( __( 'Edit', 'naturespace' ), '<p class="edit-link">', '</p>' ); ?>
			</div><!-- .comment-content -->
		</div><!-- #comment-## -->
	<?php
		break;
	endswitch;
}
endif;

/**
 * Function for adding custom classes to the menu objects.
 *
*/
add_filter( 'wp_nav_menu_objects', 'naturespace_filter_menu_class', 10, 2 );
function naturespace_filter_menu_class( $objects, $args ) {

    $ids        = array();
    $parent_ids = array();
    $top_ids    = array();
    foreach ( $objects as $i => $object ) {

        if ( 0 == $object->menu_item_parent ) {
            $top_ids[$i] = $object;
            continue;
        }
 
        if ( ! in_array( $object->menu_item_parent, $ids ) ) {
            $objects[$i]->classes[] = 'first-menu-item';
            $ids[]          = $object->menu_item_parent;
        }
 
        if ( in_array( 'first-menu-item', $object->classes ) )
            continue;
 
        $parent_ids[$i] = $object->menu_item_parent;
    }
 
    $sanitized_parent_ids = array_unique( array_reverse( $parent_ids, true ) );
 
    foreach ( $sanitized_parent_ids as $i => $id )
        $objects[$i]->classes[] = 'last-menu-item';
 
    return $objects; 
}

/**
 * Include the TGM_Plugin_Activation class.
 *  
*/
if ( current_user_can ( 'install_plugins' ) ) {
require_once get_template_directory() . '/class-tgm-plugin-activation.php'; 
add_action( 'tgmpa_register', 'naturespace_my_theme_register_required_plugins' );

function naturespace_my_theme_register_required_plugins() {

$plugins = array(
		array(
			'name'     => 'Breadcrumb NavXT',
			'slug'     => 'breadcrumb-navxt',
			'required' => false,
		),
);
  
$config = array(
		'domain'       => 'naturespace',
    'menu'         => 'install-my-theme-plugins',
		'strings'      	 => array(
		'page_title'             => __( 'Install Recommended Plugins', 'naturespace' ),
		'menu_title'             => __( 'Install Plugins', 'naturespace' ),
		'instructions_install'   => __( 'The %1$s plugin is required for this theme. Click on the big blue button below to install and activate %1$s.', 'naturespace' ),
		'instructions_activate'  => __( 'The %1$s is installed but currently inactive. Please go to the <a href="%2$s">plugin administration page</a> page to activate it.', 'naturespace' ),
		'button'                 => __( 'Install %s Now', 'naturespace' ),
		'installing'             => __( 'Installing Plugin: %s', 'naturespace' ),
		'oops'                   => __( 'Something went wrong with the plugin API.', 'naturespace' ), // */
		'notice_can_install'     => __( 'This theme requires the %1$s plugin. <a href="%2$s"><strong>Click here to begin the installation process</strong></a>. You may be asked for FTP credentials based on your server setup.', 'naturespace' ),
		'notice_cannot_install'  => __( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'naturespace' ),
		'notice_can_activate'    => __( 'This theme requires the %1$s plugin. That plugin is currently inactive, so please go to the <a href="%2$s">plugin administration page</a> to activate it.', 'naturespace' ),
		'notice_cannot_activate' => __( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'naturespace' ),
		'return'                 => __( 'Return to Recommended Plugins Installer', 'naturespace' ),
),
); 
naturespace_tgmpa( $plugins, $config ); 
}}

/**
 * WooCommerce custom template modifications.
 *  
*/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
function naturespace_woocommerce_modifications() {
  remove_action ( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 ); 
}  
add_action ( 'init', 'naturespace_woocommerce_modifications' );
add_filter ( 'woocommerce_show_page_title', '__return_false' );
} ?>