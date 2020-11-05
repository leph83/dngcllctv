<?php
    if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly.
    }

    get_header();
?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <?php
            $subtitle = get_field('subtitle') ?? false;
        ?>

        <article id="post-<?php the_ID(); ?>" class="margin-bottom">

            <div class="block  block--intro-big">
                <div class="block__content">

                    <header class="block__header  margin-bottom">
                        <h1 class="block__title  h0">
                            <strong>
                                <?php echo get_the_title(); ?>
                            </strong>
                        </h1>

                        <?php if ($subtitle) : ?>
                            <h3 class="block__subtitle  h7">
                                <?php echo $subtitle; ?>
                            </h3>
                        <?php endif; ?>
                    </header>

                </div>
            </div>

            <?php if (has_post_thumbnail()) : ?>
                <div style="margin-left: 16.66666%;  margin-top: calc(var(--gutter) * -2); width: 50%; ">
                    <div class="block  block--sidelink">
                        <div class="block__media">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    </div>
                </div>


            <?php endif; ?>


            <?php
                $contentclass = '';
                if ( (get_post_type() === 'work') || (get_post_type() === 'post') ) {
                    $contentclass = 'margin-top';
                }
            ?>

            <div class="description <?php echo $contentclass; ?>">
                <?php the_content(); ?>
            </div>

        </article>

        <?php // comments_template(); 
        ?>

        <?php // get_template_part('template-parts/nav-pagination', 'single'); 
        ?>

    <?php endwhile; ?>

    <?php get_template_part('template-parts/nav', 'pagination'); ?>

<?php endif; ?>

<?php get_footer();