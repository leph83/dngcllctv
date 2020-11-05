<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();
?>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>


        <?php
        $title = get_field('title') ?? false;
        $subtitle = get_field('subtitle') ?? false;
        $description = get_field('description') ?? false;
        $links = get_field('links') ?? false;

        $title_class = 'fw--bold';
        if ($title) {
            $title_class = '';
        }

        if (empty($title)) {
            $title =  get_the_title();
        }
        ?>

        <article id="post-<?php get_the_ID(); ?>" <?php post_class(''); ?>>

            <div class="block  block--intro-big">
                <div class="block__content">
                    <header class="block__header  ">
                        <?php if ($title) : ?>
                            <h1 class="block__title  h0  <?php echo $title_class; ?>">
                                <?php echo $title; ?>
                            </h1>
                        <?php endif; ?>

                        <?php if ($subtitle) : ?>
                            <h2 class="block__subtitle">
                                <?php echo $subtitle; ?>
                            </h2>
                        <?php endif; ?>
                    </header>

                    <?php if ($description || $links) : ?>
                        <hr>
                    <?php endif; ?>

                    <?php if ($description) : ?>
                        <div class="block__description  description">
                            <?php echo $description; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($links) :  ?>
                        <div class="block__links">
                            <?php foreach ($links as $link) : ?>
                                <?php
                                $link_url = $link['link']['url'] ?? false;
                                $link_title = $link['link']['title'] ?? false;
                                $link_target = $link['link']['title'] ?? false;

                                if ($link_target) {
                                    $link_target = ' target="' . $link_target . '" ';
                                }
                                ?>

                                <?php if ($link_url) : ?>
                                    <a class="block__link" href="<?php echo $link_url; ?>" <?php echo $link_target; ?>><?php echo $link_title; ?></a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>


            <?php if (has_post_thumbnail()) : ?>
                <div style="margin-left: 16.66666%;  margin-top: calc(var(--gutter) * -2); width: 50%; ">
                    <?php echo get_the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>

            <div class="description" id="page-content">
                <?php the_content(); ?>

                <div class="entry-links">
                    <?php wp_link_pages(); ?>
                </div>
            </div>

        </article>

        <?php if (comments_open() && !post_password_required()) {
            comments_template('', true);
        } ?>

    <?php endwhile; ?>

<?php endif; ?>

<?php get_footer();
