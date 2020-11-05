<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    $left = get_field('left') ?? false;
    $top = get_field('top') ?? false;
    $width = get_field('width') ?? false;
    $bgcolor = get_field('background_color') ?? false;

    // Mobile Position left right
    $mobileposition = get_field('mobile_position') ?? false;
    $mobile_class = 'mobile-' . $mobileposition;

    // Mobile Position Top
    $mobileposition = get_field('mobile_top_position') ?? false;
    $mobile_top_class = 'mobile-top--' . $mobileposition;



    $left = 'margin-left: '.$left.'%;';
    $top = 'margin-top: calc(var(--gutter) * '.$top.');';

    $bg_class = '';

    if ($width) {
        $width = 'max-width: '.$width.'%;';
    }

    if ($bgcolor) {
        $bg_class = 'has-bg  bg--' . $bgcolor;
    }
?>

<div class="wtp-container  <?php echo $bg_class; ?>  <?php echo $mobile_class; ?> <?php echo $mobile_top_class; ?>" 
    style="<?php echo $left; ?>  <?php echo $top; ?> <?php echo $width; ?>">
    <InnerBlocks  />
</div>