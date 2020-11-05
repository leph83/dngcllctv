<?php 

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    get_header(); 

    $featured_image = false;
    if (is_home() && get_option('page_for_posts') ) {
        $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); 

        $featured_image = $img[0];
    }

    $blogpage_id = get_option( 'page_for_posts' );

    $subtitle = get_field('subtitle', $blogpage_id) ?? false;
    $description = get_field('blog_description', $blogpage_id) ?? false;
?>
    <section>
        <div class="block  block--intro-big  margin-bottom">
            <div class="block__media">
                <img src="<?php echo $featured_image; ?>">
            </div>

            <div class="block__content">
                <header class="block__header">
                    <h1 class="block__title">
                        <strong>
                            <?php echo single_post_title(); ?>
                        </strong>
                    </h1>

                    <?php if ($subtitle) : ?>
                        <h2 class="block__subtitle">
                            <?php echo $subtitle; ?>
                        </h2>
                    <?php endif; ?>
                </header>
            </div>
        </div>

        <?php if ($description) : ?>
            <div class="wtp-container  has-bg  bg--color-4" style="margin-left: 8.33333%;  margin-top: calc(var(--gutter) * -2); max-width: 49.998%;">
                <?php echo $description; ?>
            </div>
        <?php endif; ?>

        <?php if (have_posts()) : ?>
            <div class="grid--custom" style="margin-top: calc(var(--gutter) * 2);">
                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('template-parts/content', 'overview'); ?>

                <?php endwhile; ?>

                <?php get_template_part('template-parts/nav', 'pagination'); ?>
            </div>
        <?php endif; ?>
    </section>
<?php get_footer();