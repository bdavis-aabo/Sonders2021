<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php wp_title('') ?></title>

  <?php //seo plugin grabs page title ?>

  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/assets/images/favicon.png" type="image/x-icon" />

  <?php /* Load CSS in functions.php */ ?>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Global site tag (gtag.js) - Google Analytics -->
	<?php /*
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-50ZGDT255Z"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-50ZGDT255Z');
	</script>
  */ ?>

  <!-- Segment Pixel - RET-WatersEdge-Sonders-FortCollins - DO NOT MODIFY -->
  <script src="https://secure.adnxs.com/seg?add=29026280&t=1" type="text/javascript"></script>
  <!-- End of Segment Pixel -->

  <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>

  <header class="header white-bg no-scroll-effect">
    <section class="header-top">
      <a href="<?php bloginfo('url') ?>" class="navbar-logo">
        <?php echo file_get_contents(get_template_directory() . '/assets/images/sonders-headerLogo.svg') ?>
      </a>
      <button class="nav-btn" type="button">
        <span class="nav-iconbar"></span>
        <span class="nav-iconbar"></span>
        <span class="nav-iconbar"></span>
        <span class="nav-iconbar"></span>
      </button>
    </section>
    <section class="header-bottom">
      <nav class="navigation" role="navigation">
        <?php
        wp_nav_menu(array(
          'menu'            =>  'main-menu',
          'depth'           =>  2,
          'container'       =>  'div',
          'container_class' =>  '',
          'container_id'    =>  'main-menu-navbar',
          'menu_class'      =>  'main-menu',
          //'fallback_cb'     =>  'WP_Bootstrap_Navwalker::fallback',
          //'walker'          =>  new WP_Bootstrap_Navwalker()
        ));
        ?>
        <button class="ltblue-btn btn contactBtn contactCallout nomobile" data-target="contactBox">stay informed</button>
      </nav>


    </section>
  </header>
