<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
    
    $relations = get_field('relations') ?? false;
    $style = get_field('style') ?? false;
    $link = false;
    $class = 'grid--custom';

    if ($style) {
        $link = get_field('link') ?? false;
        $class = 'grid--custom-2';

        $link_title = $link['title'] ?? false;
        $url = $link['url'] ?? false;
        $target = $link['target'] ?? false;

        if ($target) {
            $target = 'target="'.$target.'"';
        }
    }

    $left = get_field('left') ?? false;
    $top = get_field('top') ?? false;
    $width = get_field('width') ?? false;
    
    // Mobile Position left right
    $mobileposition = get_field('mobile_position') ?? false;
    $mobile_class = 'mobile-' . $mobileposition;

    // Mobile Position Top
    $mobileposition = get_field('mobile_top_position') ?? false;
    $mobile_top_class = 'mobile-top--' . $mobileposition;


    $left = 'margin-left: '.$left.'%;';

    $top = 'margin-top: calc(var(--gutter) * '.$top.');';


    if ($width) {
        $width = 'max-width: '.$width.'%;';
    }


?>



<?php if ($relations) : ?>
    <div class="grid--links  wtp-container <?php echo $mobile_class; ?> <?php echo $mobile_top_class; ?>" style="position: relative; <?php echo $left; ?>  <?php echo $top; ?> <?php echo $width; ?>">

        <?php if ($url) : ?>
            <div class="work--button">
                <div class="block__links">
                    <a class="btn  btn--line" href="<?php echo $url; ?>" <?php echo $target; ?>>
                        <?php echo $link_title; ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>

        <div class="<?php echo $class; ?>">

            <?php foreach ($relations as $key => $relation) : ?>
                <?php 
                    $id = $relation->ID ?? false;
                    $image = get_the_post_thumbnail($id, 'large') ?? false;
                    $title = $relation->post_title ?? false;
                    $url = get_the_permalink($id);
                ?>

                <div class="block  block--overlap">
                    <div class="block__media">
                        <a href="<?php echo $url; ?>">
                            <?php echo $image; ?>
                        </a>
                    </div>

                    <div class="block__content">
                        <header class="block__header  ">
                            <?php if ($title) : ?>
                                <h3 class="block__title">
                                    <a href="<?php echo $url; ?>">
                                        <?php echo $title; ?>
                                    </a>
                                </h3>
                            <?php endif ; ?>
                        </header>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>


    </div>
<?php endif; ?>

