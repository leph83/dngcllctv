<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
    
    $link = get_field('link') ?? false;
    $title = $link['title'] ?? false;
    $url = $link['url'] ?? false;
    $target = $link['target'] ?? false;

    if ($target) {
        $target = 'target="'.$target.'"';
    }

    $left = get_field('left') ?? false;
    $top = get_field('top') ?? false;
    $width = get_field('width') ?? false;
    

    $left = 'margin-left: '.$left.'%;';
    $top = 'margin-top: calc(var(--gutter) * '.$top.');';
        
    if ($width) {
        $width = 'max-width: '.$width.'%;';
    } else {
        $width = '';
    }
        
?>



<div class="wtp-container" style="<?php echo $left; ?>  <?php echo $top; ?> <?php echo $width; ?>">
    
    <div class="block  block--sidelink">

        <div class="block__links">
            <?php if ($url) : ?>
                <a class="btn  btn--line" href="<?php echo $url; ?>" <?php echo $target; ?>>
                    <?php echo $title; ?>
                </a>
            <?php endif; ?>
        </div>

        <div class="block__media">
            <InnerBlocks  />
        </div>
    </div>

</div>