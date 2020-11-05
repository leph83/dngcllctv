<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    $gallery = get_field('gallery') ?? false;    
?>

<?php if ( count($gallery) > 0 ) : ?>

    <?php $speed = 1; ?>

    <style>
        .wtp-gallery,
        .wtp-gallery .wtp-gallery__image:first-child {
            position: relative;
            opacity: 1;
        }

        .wtp-gallery .wtp-gallery__image:not(:first-child) {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }

        .wtp-gallery .wtp-gallery__image {
            animation-name: gif;
            animation-duration: <?php echo count($gallery) * $speed; ?>s;
            animation-iteration-count: infinite;
        }

        <?php
            foreach ($gallery as $key => $value) {
                $key = intval($key);
                $duration = $key * $speed;

                echo '
                    .wtp-gallery .wtp-gallery__image:nth-child('.intval($key + 1 ).') {
                        animation-delay: '.$duration.'s;
                    }
                ';
            }
        ?>

        @keyframes gif {
            0%   {
                opacity: 1;
            }

            <?php echo 100 / count($gallery); ?>% {
                opacity: 1;
            }

            <?php echo 100 / count($gallery) + 1; ?>% {
                opacity: 0;
            }

            100%  {
                opacity: 0;
            }
        }

    </style>

    <div class="wtp-gallery" >
        <?php foreach ($gallery as $key => $image) : ?>
            <div class="wtp-gallery__image">
                <?php echo wp_get_attachment_image($image['ID'], 'large'); ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>