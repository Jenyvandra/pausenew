<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 *
 * @version 5.3.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/site.webmanifest">
        <link rel="mask-icon" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/safari-pinned-tab.svg" color="#0d6efd">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!-- font -->
        <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- fontawesome -->
        <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.4.2/css/all.css"/> -->
        <!-- owl carousel -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


        <?php wp_head(); ?>
    </head>
    <?php
    $single_webinars_class = "";
    if (is_singular(array('events', 'webinars'))) {
        $single_webinars_class = "custom_single_webinars_events";
    }elseif (is_page('907') || is_page('3')) {
        $single_webinars_class = "terms-of-use-privacy-policy";
    }elseif (is_page('1025')) {
        $single_webinars_class = "custom-thankyou";
    }elseif (is_page('2146')) {
		$single_webinars_class = "custom-register-thank-you";
	}
    ?>
    <body <?php body_class($single_webinars_class); ?>>

        <?php wp_body_open(); ?>

        <div id="page" class="site sticky-top">

            <header id="masthead" class="site-header">
                <div class="pf-top-wrapper">
                    <div class="container-fluid">
                        <div class="topnav-inner">
                            <div class="header-social-inner">
                                <?php
                                $pf_instagram_icon = get_field('pf_instagram_icon', 'option');
                                $pf_gen_ig_link = get_field('pf_gen_ig_link', 'option');
                                $pf_facebook_icon = get_field('pf_facebook_icon', 'option');
                                $pf_gen_fb_link = get_field('pf_gen_fb_link', 'option');
                                $pf_twitter_icon = get_field('pf_twitter_icon', 'option');
                                $pf_twitter_link = get_field('pf_twitter_link', 'option');
                                $pf_youtube_icon = get_field('pf_youtube_icon', 'option');
                                $pf_youtube_link = get_field('pf_youtube_link', 'option');
                                ?>
                                <?php if ($pf_gen_ig_link && $pf_instagram_icon) { ?>
                                    <a href="<?= $pf_gen_ig_link; ?>"><img src="<?= $pf_instagram_icon['url']; ?>" alt="instagram"></a>
                                <?php } ?>
                                <?php if ($pf_twitter_link && $pf_twitter_icon) { ?>
                                    <a href="<?= $pf_twitter_link; ?>"><img src="<?= $pf_twitter_icon['url']; ?>" alt="twitter"></a>
                                <?php } ?>
                                <?php if ($pf_gen_fb_link && $pf_facebook_icon) { ?>
                                    <a href="<?= $pf_gen_fb_link; ?>"><img src="<?= $pf_facebook_icon['url']; ?>" alt="facebook"></a>
                                <?php } ?>
                                <?php if ($pf_youtube_link && $pf_youtube_icon) { ?>
                                    <a href="<?= $pf_youtube_link; ?>"><img src="<?= $pf_youtube_icon['url']; ?>" alt="facebook"></a>
                                <?php } ?>
                            </div>  

                            <div class="login-det">
                                <ul>

                                    <?php if (!is_user_logged_in()) { ?>
                                        <li><a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-user" aria-controls="offcanvas-user">login</a></li>
                                        <li><a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-user-register" aria-controls="offcanvas-user-register">register</a></li>
                                        <?php
                                    } else {
                                        $current_user = wp_get_current_user();
                                        $user_info = get_userdata($current_user->ID);
                                        ?>
                                        <?php /*
                                          <li><a href="<?= home_url();?>/my-account">My Account</a></li>
                                         */ 
//                                        var_dump(wp_logout_url());
                                        ?>
                                        <li><a href="<?= wp_logout_url(); ?>"><?= $user_info->display_name; ?>, Logout</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <nav id="nav-main" class="nav-wrapper navbar navbar-expand-xl">
                    <div class="container-fluid">
                        <?php $logo_img = get_field('pf_gen_header_logo', 'option'); ?>
                        <?php if (!empty($logo_img)) { ?>
                            <a class="navbar-brand" href="<?= esc_url(home_url()); ?>"><img src="<?= esc_url($logo_img['url']); ?>" alt="pauseforwardss"></a><?php } ?>

                        <!-- New Mobile menu -->      
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header">
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <!-- Bootstrap 5 Nav Walker Main Menu -->
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'main-menu',
                                    'container' => false,
                                    'menu_class' => '',
                                    'fallback_cb' => '__return_false',
                                    'items_wrap' => '<ul id="bootscore-navbar" class="navbar-nav mx-auto mb-2 mb-lg-0">%3$s</ul>',
                                    'depth' => 2,
                                    'walker' => new bootstrap_5_wp_nav_menu_walker_pf()
                                ));
                                ?>
                                <div class="d-flex" role="search">
                                    <?php
                                    $book_button_link = get_field('book_consultant_link', 'option');
                                    if ($book_button_link) {
                                        ?>
                                        <a href="<?= $book_button_link; ?>"><button class="btn btn-outline-success"><?php _e('Consult Expert','pause');?></button></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

                <?php
                if (class_exists('WooCommerce')) :
                //get_template_part('template-parts/header/top-nav-search-collapse', 'woocommerce');
                endif;
                ?>

                <!-- Offcanvas User and Cart -->
                <?php
                if (class_exists('WooCommerce')) :
                    get_template_part('template-parts/header/offcanvas', 'woocommerce');
                endif;
                ?>

            </header><!-- #masthead -->