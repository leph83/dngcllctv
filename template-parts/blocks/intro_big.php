<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
    
    $title = get_field('title') ?? false;
    $subtitle = get_field('subtitle') ?? false;
    $description = get_field('description') ?? false;
    $links = get_field('links') ?? false;
?>



<div class="block  block--intro-big">
    <div class="block__content">
        <header class="block__header  ">
            <?php if ($title) : ?>
                <h1 class="block__title">
                    <?php echo $title; ?>
                </h1>
            <?php endif ; ?>

            <?php if ($subtitle) : ?>
                <h2 class="block__subtitle">
                    <?php echo $subtitle; ?>
                </h2>
            <?php endif; ?>
        </header>

        <?php if ($description || $links)  : ?>
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
                            $link_target = ' target="'.$link_target.'" ';
                        }
                    ?>

                    <?php if ($link_url) : ?>
                        <a class="block__link" href="<?php echo $link_url; ?>" <?php echo $link_target; ?> ><?php echo $link_title; ?></a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
