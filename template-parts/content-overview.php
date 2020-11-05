<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('block  block--overlap'); ?>>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="block__media">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail('large'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="block__content">
        <header class="block__header">
            <h2 class="block__title">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
                    <?php the_title(); ?> 
                </a>            
            </h2>
        </header>
    </div>
</article>