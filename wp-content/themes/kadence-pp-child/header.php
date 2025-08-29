<?php
/** Custom header (Kadence child) */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="pp-header" class="pp-header" role="banner">
  <div class="pp-header__inner">
    <a class="pp-logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php bloginfo('name'); ?>">
      <?php if (has_custom_logo()) { the_custom_logo(); } else { bloginfo('name'); } ?>
    </a>

    <nav class="pp-nav" aria-label="<?php esc_attr_e('Primary', 'pp'); ?>">
      <?php
      wp_nav_menu([
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => 'pp-menu',
        'fallback_cb'    => '__return_empty_string',
      ]);
      ?>
    </nav>

    <div class="pp-actions">
      <a class="pp-phone" href="tel:1300123456">1300&nbsp;123&nbsp;456</a>
      <a class="pp-btn" href="<?php echo esc_url( home_url('/contact') ); ?>"><?php esc_html_e('Get Free Audit','pp'); ?></a>
      <button class="pp-burger" aria-controls="pp-mobile" aria-expanded="false" aria-label="<?php esc_attr_e('Open menu','pp'); ?>">
        <span aria-hidden="true"></span><span aria-hidden="true"></span><span aria-hidden="true"></span>
      </button>
    </div>
  </div>

  <div id="pp-mobile" class="pp-mobile" hidden>
    <?php
    wp_nav_menu([
      'theme_location' => 'primary',
      'container'      => false,
      'menu_class'     => 'pp-mobile-menu',
      'fallback_cb'    => '__return_empty_string',
    ]);
    ?>
    <div class="pp-mobile-cta">
      <a class="pp-btn" href="<?php echo esc_url( home_url('/contact') ); ?>"><?php esc_html_e('Get Free Audit','pp'); ?></a>
      <a class="pp-phone" href="tel:1300123456">1300&nbsp;123&nbsp;456</a>
    </div>
  </div>
</header>

<main id="content" class="site-content" role="main">