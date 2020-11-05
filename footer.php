<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    $footer_title = get_field('title', 'option') ?? false;
    $footer_description = get_field('description', 'option') ?? false;
    $footer_social = get_field('links', 'option') ?? false;
?>

        </main>

       
    </div>


    <footer class="footer" id="footer">
        <div class="lc">
            <div class="footer__content">

                <div class="footer__item">
                    <strong>
                        <?php echo $footer_title; ?>
                    </strong>
                </div>

                <div class="footer__item  footer__item--wide">
                    <div class="description">
                        <?php echo $footer_description; ?>
                    </div>

                    <?php if ($footer_social) : ?>
                    
                        <div class="margin-top  h5">
                    
                            <?php foreach ($footer_social as $key => $social) : 
                                $icon = $social['icon'] ?? false;
                                $link = $social['link'] ?? false;
                            ?>

                                <a rel="noopener" href="<?php echo $link; ?>" target="_blank">
                                    <i class="fab fa-<?php echo $icon; ?>" aria-hidden="true">
                                    </i>
                                    <span class="hidden"><?php echo $icon; ?></span>
                                </a>

                            <?php endforeach; ?>
                        
                        </div>
                    <?php endif; ?>
                </div>

                <div class="footer__item">

                    <?php
                        $args = array(
                            'theme_location'=> 'language',
                            'container'     => '',
                            'menu_class'    => 'nav  nav--dropdown  nav--language',
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

                    <?php
                        $args = array(
                            'theme_location'=> 'footer',
                            'container'     => '',
                            'menu_class'    => 'nav  nav--footer',
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
    </footer>

    <?php wp_footer(); ?>

</body>
</html>