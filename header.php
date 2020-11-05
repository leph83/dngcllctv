<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    $has_sidebar = '';
    if ( is_active_sidebar( 'primary-widget-area' ) ) {
        $has_sidebar = 'main--has-sidebar';
    }


?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>

    <meta name="google-site-verification" content="95ImC4sgIiQpJ7jRUwGkquaCSL_ZSFHTS9ZAf__NDcQ" />
</head>

<body <?php body_class('body  body--sticky-footer'); ?>>
    
    <header id="header" class="header">
        <div class="header__content  lc">

            <div class="header__item  header__item--branding">
                <div class="header__branding  branding" href="<?php echo get_home_url(); ?>">
                    <?php if ( function_exists('wtp_blog_info') ) {
                        echo wtp_blog_info();
                    } ?>
                </div>
            </div>

            <input type="checkbox" id="burger" class="burger-input">
            <label for="burger" class="burger-label"><span class="fries"></span><span class="hidden">Menu</span></label>

            <div class="header__item  header__item--nav  navigation">
                <nav id="menu" class="header__nav">
                    <?php
                        $args = array(
                            'theme_location'=> 'primary',
                            'container'     => '',
                            'menu_class'    => 'nav  nav--dropdown  nav--header',
                            'fallback_cb'   => false,
                            'add_submenu_class'  => 'nav__submenu',
                            'add_li_class'  => 'nav__item',
                            'add_li_active_class' => 'nav__item--active',
                            'add_li_parent_class' => 'nav__item--parent',
                            'add_a_class'   => 'nav__link',
                            'add_a_active_class'   => 'nav__link--active',
                            );
                        wp_nav_menu($args);
                    ?>
                </nav>

                <div class="header__lang">
                    <?php
                        $args = array(
                            'theme_location'=> 'language',
                            'container'     => '',
                            'menu_class'    => 'nav  nav--language',
                            'fallback_cb'   => false,
                            'add_submenu_class'  => 'nav__submenu',
                            'add_li_class'  => 'nav__item',
                            'add_li_active_class' => 'nav__item--active',
                            'add_li_parent_class' => 'nav__item--parent',
                            'add_a_class'   => 'nav__link',
                            'add_a_active_class'   => 'nav__link--active',
                            );
                        wp_nav_menu($args);
                    ?>
                </div>

            </div>
        </div>
    </header>


    <div class="<?php echo $has_sidebar; ?>   lc">
        <main id="content" class="main">