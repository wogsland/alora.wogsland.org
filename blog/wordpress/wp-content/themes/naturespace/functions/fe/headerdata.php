<?php
/**
 * Headerdata of Theme options.
 * @package NatureSpace
 * @since NatureSpace 1.0.0
*/  

// Additional CSS
if(	!is_admin()){
function naturespace_fonts_include () {
global $naturespace_options_db;
// Google Fonts
$bodyfont = $naturespace_options_db['naturespace_body_google_fonts'];
$headingfont = $naturespace_options_db['naturespace_headings_google_fonts'];
$headlinefont = $naturespace_options_db['naturespace_headline_google_fonts'];
$postentryfont = $naturespace_options_db['naturespace_postentry_google_fonts'];
$sidebarfont = $naturespace_options_db['naturespace_sidebar_google_fonts'];
$menufont = $naturespace_options_db['naturespace_menu_google_fonts'];

$fonturl = "//fonts.googleapis.com/css?family=";

$bodyfonturl = $fonturl.$bodyfont;
$headingfonturl = $fonturl.$headingfont;
$headlinefonturl = $fonturl.$headlinefont;
$postentryfonturl = $fonturl.$postentryfont;
$sidebarfonturl = $fonturl.$sidebarfont;
$menufonturl = $fonturl.$menufont;
	// Google Fonts
     if ($bodyfont != 'default' && $bodyfont != ''){
      wp_enqueue_style('naturespace-google-font1', $bodyfonturl); 
		 }
     if ($headingfont != 'default' && $headingfont != ''){
      wp_enqueue_style('naturespace-google-font2', $headingfonturl);
		 }
     if ($headlinefont != 'default' && $headlinefont != ''){
      wp_enqueue_style('naturespace-google-font4', $headlinefonturl); 
		 }
     if ($postentryfont != 'default' && $postentryfont != ''){
      wp_enqueue_style('naturespace-google-font5', $postentryfonturl); 
		 }
     if ($sidebarfont != 'default' && $sidebarfont != ''){
      wp_enqueue_style('naturespace-google-font6', $sidebarfonturl);
		 }
     if ($menufont != 'default' && $menufont != ''){
      wp_enqueue_style('naturespace-google-font8', $menufonturl);
		 }
}
add_action( 'wp_enqueue_scripts', 'naturespace_fonts_include' );
}

// Additional CSS
function naturespace_css_include () {
global $naturespace_options_db;
    if ($naturespace_options_db['naturespace_layout_width'] != 'Wide' ){
			wp_enqueue_style('naturespace-boxed-layout', get_template_directory_uri().'/css/boxed-layout.css');
		}

		if ($naturespace_options_db['naturespace_css'] == 'Blue' ){
			wp_enqueue_style('naturespace-style-blue', get_template_directory_uri().'/css/colors/blue.css');
		}

		if ($naturespace_options_db['naturespace_css'] == 'Pink' ){
			wp_enqueue_style('naturespace-style-pink', get_template_directory_uri().'/css/colors/pink.css');
		}
}
add_action( 'wp_enqueue_scripts', 'naturespace_css_include' );

// Display Sidebar on Posts/Pages
function naturespace_display_sidebar() {
global $naturespace_options_db;
    $display_sidebar = $naturespace_options_db['naturespace_display_sidebar']; 
		if ($display_sidebar == 'Hide') { ?>
		<?php _e('.single .container #main-content, .page .container #main-content, .error404 .container #main-content { width: 100%; }', 'naturespace'); ?>
<?php } 
}

// Display Sidebar on Archives
function naturespace_display_sidebar_archives() {
global $naturespace_options_db;
    $display_sidebar_archives = $naturespace_options_db['naturespace_display_sidebar_archives']; 
		if ($display_sidebar_archives == 'Hide') { ?>
		<?php _e('.blog .container #main-content, .archive .container #main-content, .search .container #main-content { width: 100%; } .archive #sidebar { display: none; }', 'naturespace'); ?>
<?php } 
}

// Header Layout - Wide
function naturespace_get_header_layout() {
global $naturespace_options_db;
    $header_layout = $naturespace_options_db['naturespace_header_layout']; 
		if ($header_layout != 'Centered') { ?>
		<?php _e('#wrapper-header .site-title { text-align: left; } #wrapper-header .header-logo { margin-left: 0; } .rtl #wrapper-header .site-title { text-align: right; } @media screen and (max-width: 990px) { html #wrapper #wrapper-header .header-content .site-title, html #wrapper #wrapper-header .header-content .header-logo { margin-bottom: 0 !important; } }', 'naturespace'); ?>
<?php } 
}

// Title Box width
function naturespace_get_page_title_width() {
global $naturespace_options_db;
    $page_title_width = $naturespace_options_db['naturespace_page_title_width']; 
    $header_layout = $naturespace_options_db['naturespace_header_layout'];
		if ($page_title_width != '' && $header_layout != 'Centered') { ?>
		<?php echo '#wrapper #wrapper-header .title-box { width: '; ?><?php echo $page_title_width ?><?php echo '; }'; }
    elseif ($page_title_width == '' && $header_layout != 'Centered') { ?>
    <?php echo '#wrapper #wrapper-header .title-box { width: 50%; }'; ?>
<?php } 
}

// Menu Box width
function naturespace_get_header_menu_width() {
global $naturespace_options_db;
    $header_menu_width = $naturespace_options_db['naturespace_header_menu_width']; 
    $header_layout = $naturespace_options_db['naturespace_header_layout'];
		if ($header_menu_width != '' && $header_layout != 'Centered') { ?>
		<?php echo '#wrapper #wrapper-header .menu-box { width: '; ?><?php echo $header_menu_width ?><?php echo '; }'; }
    elseif ($header_menu_width == '' && $header_layout != 'Centered') { ?>
    <?php echo '#wrapper #wrapper-header .menu-box { width: 50%; }'; ?>
<?php } 
}

// Featured Images Size
function naturespace_featured_image_size() {
global $naturespace_options_db;
    $featured_image_size = $naturespace_options_db['naturespace_featured_image_size']; 
		if ($featured_image_size == 'Large') { ?>
		<?php _e('.post-entry .attachment-post-thumbnail { margin: 0 0 10px; max-width: 100%; clear: both; float: none; }', 'naturespace'); ?>
<?php } 
}

// Display Meta Box - post entries styling
function naturespace_display_meta_post_entry() {
global $naturespace_options_db;
    $display_meta_post_entry = $naturespace_options_db['naturespace_display_meta_post_entry']; 
		if ($display_meta_post_entry == 'Hide') { ?>
		<?php _e('body #main-content .post-entry .post-entry-headline { margin-bottom: 10px; }', 'naturespace'); ?>
<?php } 
}

// FONTS
// Body font
function naturespace_get_body_font() {
global $naturespace_options_db;
    $bodyfont = $naturespace_options_db['naturespace_body_google_fonts'];
    if ($bodyfont != 'default' && $bodyfont != '') { ?>
    <?php _e('html body, #wrapper blockquote, #wrapper q, #wrapper .container #comments .comment, #wrapper .container #comments .comment time, #wrapper .container #commentform .form-allowed-tags, #wrapper .container #commentform p, #wrapper input, #wrapper button, #wrapper textarea, #wrapper select, #wrapper #main-content .post-meta { font-family: "', 'naturespace'); ?><?php echo $bodyfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'naturespace'); ?>
<?php } 
}

// Site title font
function naturespace_get_headings_google_fonts() {
global $naturespace_options_db;
    $headingfont = $naturespace_options_db['naturespace_headings_google_fonts']; 
		if ($headingfont != 'default' && $headingfont != '') { ?>
		<?php _e('#wrapper #wrapper-header .site-title { font-family: "', 'naturespace'); ?><?php echo $headingfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'naturespace'); ?>
<?php } 
}

// Page/post headlines font
function naturespace_get_headlines_font() {
global $naturespace_options_db;
    $headlinefont = $naturespace_options_db['naturespace_headline_google_fonts'];
    if ($headlinefont != 'default' && $headlinefont != '') { ?>
		<?php _e('#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper .container .navigation .section-heading, #wrapper #comments .entry-headline, #wrapper .info-box .info-box-headline, #wrapper .presentation-box .presentation-box-headline, #wrapper .presentation-box .presentation-box-subtitle, #wrapper .box-image .box-image-text .box-image-headline, #wrapper .header-image .header-image-text .header-image-headline { font-family: "', 'naturespace'); ?><?php echo $headlinefont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'naturespace'); ?>
<?php } 
}

// Post entry font
function naturespace_get_postentry_font() {
global $naturespace_options_db;
    $postentryfont = $naturespace_options_db['naturespace_postentry_google_fonts']; 
		if ($postentryfont != 'default' && $postentryfont != '') { ?>
		<?php _e('#wrapper #main-content .post-entry .post-entry-headline, #wrapper #main-content .grid-entry .grid-entry-headline, #wrapper #main-content .slides li a, #wrapper #main-content .home-list-posts ul li a { font-family: "', 'naturespace'); ?><?php echo $postentryfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'naturespace'); ?>
<?php } 
}

// Sidebar and Footer widget headlines font
function naturespace_get_sidebar_widget_font() {
global $naturespace_options_db;
    $sidebarfont = $naturespace_options_db['naturespace_sidebar_google_fonts'];
    if ($sidebarfont != 'default' && $sidebarfont != '') { ?>
		<?php _e('#wrapper .container #sidebar .sidebar-widget .sidebar-headline, #wrapper #wrapper-footer #footer .footer-widget .footer-headline { font-family: "', 'naturespace'); ?><?php echo $sidebarfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'naturespace'); ?>
<?php } 
}

// Main Header menu font
function naturespace_get_menu_font() {
global $naturespace_options_db;
    $menufont = $naturespace_options_db['naturespace_menu_google_fonts']; 
		if ($menufont != 'default' && $menufont != '') { ?>
		<?php _e('#wrapper #wrapper-header .menu-box ul li a, #wrapper #wrapper-header .menu-panel ul li a { font-family: "', 'naturespace'); ?><?php echo $menufont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'naturespace'); ?>
<?php } 
}

// User defined CSS.
function naturespace_get_own_css() {
global $naturespace_options_db;
    $own_css = $naturespace_options_db['naturespace_own_css']; 
		if ($own_css != '') { ?>
		<?php echo esc_attr($own_css); ?>
<?php } 
}

// Display custom CSS.
function naturespace_custom_styles() { ?>
<?php echo ("<style type='text/css'>"); ?>
<?php naturespace_get_own_css(); ?>
<?php naturespace_display_sidebar(); ?>
<?php naturespace_display_sidebar_archives(); ?>
<?php naturespace_get_header_layout(); ?>
<?php naturespace_get_page_title_width(); ?>
<?php naturespace_get_header_menu_width(); ?>
<?php naturespace_featured_image_size(); ?>
<?php naturespace_display_meta_post_entry(); ?>
<?php naturespace_get_body_font(); ?>
<?php naturespace_get_headings_google_fonts(); ?>
<?php naturespace_get_headlines_font(); ?>
<?php naturespace_get_postentry_font(); ?>
<?php naturespace_get_sidebar_widget_font(); ?>
<?php naturespace_get_menu_font(); ?>
<?php echo ("</style>"); ?>
<?php
} 
add_action('wp_enqueue_scripts', 'naturespace_custom_styles'); ?>