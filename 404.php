<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    get_header(); 
?>


<article class="block  block--intro-big">
    <div class="block__content">
        <header class="block__header  ">

            <h1 class="block__title  h0  <?php echo $title_class; ?>">
                <?php esc_html_e('Nothing to see here', 'wtp'); ?>
            </h1>
    
            <h2 class="block__subtitle">
                <?php esc_html_e('Are you lost? Use the navigation to find what you are looking for!', 'wtp'); ?>
            </h2>

        </header>
    </div>
</article>

<?php get_footer();