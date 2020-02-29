<?php
/**
 * The header template file.
 * @package NatureSpace
 * @since NatureSpace 1.0.0
*/
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<?php global $naturespace_options_db; ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" /> 
  <meta name="viewport" content="width=device-width, minimumscale=1.0, maximum-scale=1.0" />  
  <title><?php wp_title( '|', true, 'right' ); ?></title>  
  <!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
<?php if ($naturespace_options_db['naturespace_favicon_url'] != ''){ ?>
	<link rel="shortcut icon" href="<?php echo esc_url($naturespace_options_db['naturespace_favicon_url']); ?>" />
<?php } ?>
<?php wp_head(); ?>   
</head>
 
<body <?php body_class(); ?> id="wrapper">
<div id="container-boxed"> 
<div id="container-boxed-inner">
<header id="wrapper-header">
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
<?php if ( $naturespace_options_db['naturespace_header_address'] != '' || $naturespace_options_db['naturespace_header_email'] != '' || $naturespace_options_db['naturespace_header_phone'] != '' || $naturespace_options_db['naturespace_header_skype'] != '' ) {  ?>
  <div class="top-navigation-wrapper">
    <div class="top-navigation">
      <p class="header-contact">
<?php if ( $naturespace_options_db['naturespace_header_address'] != '' ){ ?>
        <span class="header-contact-address"><i class="icon_house" aria-hidden="true"></i><?php echo esc_attr($naturespace_options_db['naturespace_header_address']); ?></span>
<?php } ?>
<?php if ( $naturespace_options_db['naturespace_header_email'] != '' ){ ?>
        <span class="header-contact-email"><i class="icon_mail" aria-hidden="true"></i><?php echo esc_attr($naturespace_options_db['naturespace_header_email']); ?></span>
<?php } ?>
<?php if ( $naturespace_options_db['naturespace_header_phone'] != '' ){ ?>
        <span class="header-contact-phone"><i class="icon_phone" aria-hidden="true"></i><?php echo esc_attr($naturespace_options_db['naturespace_header_phone']); ?></span>
<?php } ?>
<?php if ( $naturespace_options_db['naturespace_header_skype'] != '' ){ ?>
        <span class="header-contact-skype"><i class="social_skype" aria-hidden="true"></i><?php echo esc_attr($naturespace_options_db['naturespace_header_skype']); ?></span>
      </p>
<?php } ?> 
    </div>
  </div>
<?php }} ?>
  
  <div class="header-content-wrapper">
    <div class="header-content">
      <div class="title-box">
<?php if ( $naturespace_options_db['naturespace_logo_url'] == '' ) { ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
<?php } else { ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="header-logo" src="<?php echo esc_url($naturespace_options_db['naturespace_logo_url']); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
<?php } ?>
      </div>
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
<?php if ( $naturespace_options_db['naturespace_header_layout'] != 'Centered' ) { ?>
      <div class="menu-box">
<?php wp_nav_menu( array( 'menu_id'=>'nav', 'theme_location'=>'main-navigation' ) ); ?>
      </div>
<?php }} ?>
    </div>
  </div>
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
<?php if ( $naturespace_options_db['naturespace_header_layout'] == 'Centered' ) { ?>
  <div class="menu-panel-wrapper">
    <div class="menu-panel">
<?php wp_nav_menu( array( 'menu_id'=>'main-nav', 'theme_location'=>'main-navigation' ) ); ?>
    </div>
  </div>
<?php }} ?>

<?php if ( is_home() || is_front_page() ) { ?>
<?php if ( get_header_image() != '' && $naturespace_options_db['naturespace_display_header_image'] != 'Everywhere except Homepage' ) { ?>
  <div class="header-image">
    <img class="header-img" src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" />
    <div class="header-image-container">
    <div class="header-image-text-wrapper">
      <div class="header-image-text">
<?php if ( $naturespace_options_db['naturespace_header_image_headline'] != '' ) { ?>
        <p class="header-image-headline"><?php echo esc_attr($naturespace_options_db['naturespace_header_image_headline']); ?></p>
<?php } if ( $naturespace_options_db['naturespace_header_image_link_url'] != '' && $naturespace_options_db['naturespace_header_image_link_text'] != '' ) { ?>
        <p class="header-image-link-wrapper"><a class="header-image-link" href="<?php echo esc_url($naturespace_options_db['naturespace_header_image_link_url']); ?>"><?php echo esc_attr($naturespace_options_db['naturespace_header_image_link_text']); ?></a></p>
<?php } ?>
      </div>
    </div>
    </div>
  </div>
<?php } ?>
<?php } else { ?>
<?php if ( get_header_image() != '' && $naturespace_options_db['naturespace_display_header_image'] != 'Only on Homepage' ) { ?>
  <div class="header-image">
    <img class="header-img" src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" />
  </div>
<?php }} ?>
</header> <!-- end of wrapper-header -->