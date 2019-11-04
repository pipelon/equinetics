<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average = $product->get_average_rating();

if ($rating_count > 0) :
    ?>

    <div class="woocommerce-product-rating">
        <div>
            <h2 style="margin: 0">Calificación de clientes y usuarios</h2>
            <?php
            $altoBarra = 20;
            $spaceBarra = 0;
            $bg = '#be1e2d';
            $bdr = 'border: 1px solid #be1e2d;';
            for ($index = 1; $index <= 5; $index++) :
                if ($index > $average) {
                    $bg = '#fefefe';
                    $bdr = '1px solid #f6f6f6;';
                }
                ?>
                <div class="bar-rating" style="height: <?= $altoBarra; ?>px; background: <?= $bg; ?>; 
                     left: <?= $spaceBarra; ?>%; border: <?= $bdr; ?>; animation: 3s ease-out 0s 1 slideInFromTop<?= $index; ?>;">
                </div>
                     <?php
                     $altoBarra += 20;
                     $spaceBarra += 17;
                     ?>
                <style>
                    @keyframes slideInFromTop<?= $index; ?> {
                        from { height: 0%; }
                        to   { height: <?= $altoBarra; ?>; }
                    }​
                </style>
            <?php endfor; ?>

        </div>
        <?php if (comments_open()) : ?>
            (<?php
            printf(_n('%s customer review', '%s customer reviews', $review_count, 'woocommerce')
                    , '<span class="count">' . esc_html($review_count) . '</span>');
            ?>)
        <?php endif ?>
    </div>

<?php endif; ?>
