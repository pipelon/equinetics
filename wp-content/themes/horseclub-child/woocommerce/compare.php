<?php
/**
 * Woocommerce Compare page
 *
 * @author YITH
 * @package YITH Woocommerce Compare
 * @version 2.3.2
 */
// remove the style of woocommerce
if (defined('WOOCOMMERCE_USE_CSS') && WOOCOMMERCE_USE_CSS)
    wp_dequeue_style('woocommerce_frontend_styles');

$is_iframe = (bool) ( isset($_REQUEST['iframe']) && $_REQUEST['iframe'] );

wp_enqueue_script('jquery-imagesloaded', YITH_WOOCOMPARE_ASSETS_URL . '/js/imagesloaded.pkgd.min.js', array('jquery'), '3.1.8', true);
wp_enqueue_script('jquery-fixedheadertable', YITH_WOOCOMPARE_ASSETS_URL . '/js/jquery.dataTables.min.js', array('jquery'), '1.10.19', true);
wp_enqueue_script('jquery-fixedcolumns', YITH_WOOCOMPARE_ASSETS_URL . '/js/FixedColumns.min.js', array('jquery', 'jquery-fixedheadertable'), '3.2.6', true);

$widths = array();
foreach ($products as $product)
    $widths[] = '{ "sWidth": "205px", resizeable:true }';

$table_text = get_option('yith_woocompare_table_text', __('Compare products', 'yith-woocommerce-compare'));
do_action('wpml_register_single_string', 'Plugins', 'plugin_yit_compare_table_text', $table_text);
$localized_table_text = apply_filters('wpml_translate_single_string', $table_text, 'Plugins', 'plugin_yit_compare_table_text');
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if gt IE 9]>
<html class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if !IE]>
<html <?php language_attributes() ?>>
<![endif]-->

<!-- START HEAD -->
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php _e('Product Comparison', 'yith-woocommerce-compare') ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />

    <?php wp_head() ?>

    <?php do_action('yith_woocompare_popup_head') ?>    

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" />
    <link rel="stylesheet" href="<?php echo YITH_WOOCOMPARE_URL ?>assets/css/colorbox.css"/>
    <link rel="stylesheet" href="<?php echo YITH_WOOCOMPARE_URL ?>assets/css/jquery.dataTables.css"/>
    <link rel="stylesheet" href="<?php echo $this->stylesheet_url() ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/style.css" type="text/css" />

    <style type="text/css">
        body.loading {
            background: url("<?php echo YITH_WOOCOMPARE_URL ?>assets/images/colorbox/loading.gif") no-repeat scroll center center transparent;
        }
    </style>
</head>
<!-- END HEAD -->

<?php global $product; ?>
<?php
//DEJO SOLO LAS MISMAS CATEGORIAS
$firstCategory = 0;
foreach ($products as $product_id => $product) {
    if ($firstCategory == 0) {
        $firstCategory = $product->category_ids[2];
    }
    if ($product->category_ids[2] != $firstCategory) {
        unset($products[$product_id]);
    }
}
//DEJO SOLO TRES PRODUCOTOS
$products = array_slice($products, 0, 3, true);
//REORDENAR ORDEN 
$fields = [
    'title' => 'Título',
    'image' => 'Imagen',
    'price' => 'Precio',
    'add-to-cart' => 'Contratar servicio'
];
?>

<!-- START BODY -->
<body <?php body_class('woocommerce') ?> style="background: #f5f5f5 !important; font-family: 'Open Sans', san-serif !important; ">

    <h1 style="font-size: 23px !important; background: #d7cfc4; color: black;" class="pruebah1">
        <?php echo $localized_table_text ?>
        <?php if (!$is_iframe) : ?><a class="close" href="#" style="color: black"><?php _e('[X]', 'yith-woocommerce-compare') ?></a><?php endif; ?>
    </h1>

    <div id="yith-woocompare" class="woocommerce">

        <?php do_action('yith_woocompare_before_main_table'); ?>

        <table class="compare-list" cellpadding="0" cellspacing="0"<?php if (empty($products)) echo ' style="width:100%"' ?>>
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <?php foreach ($products as $product_id => $product) : ?>
                        <td></td>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>&nbsp;</th>
                    <?php foreach ($products as $product_id => $product) : ?>
                        <td></td>
                    <?php endforeach; ?>
                </tr>
            </tfoot>
            <tbody>

                <?php if (empty($products)) : ?>

                    <tr class="no-products">
                        <td><?php _e('No products added in the compare table.', 'yith-woocommerce-compare') ?></td>
                    </tr>

                <?php else : ?>

                    <?php //$fields["category"] = "Categoría"; ?>
                    <?php foreach ($fields as $field => $name) : ?>

                        <tr class="<?php echo $field ?>">

                                                                                            <!--<th>
                            <?php //if ($field != 'image') echo $name ?>
                                                                                            </th>-->

                            <?php
                            $index = 0;
                            foreach ($products as $product_id => $product) :

                                $product_class = ( $index % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product_id;
                                ?>
                                <td class="<?php echo $product_class; ?>"><?php
                                    switch ($field) {

                                        case 'image':
                                            $portfolio_id = get_post_meta($product_id, 'portfolio_id', true);
                                            $link = get_permalink($portfolio_id);
                                            echo '<div class="image-wrap"><a href="' . esc_url($link) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">' . $product->get_image('yith-woocompare-image') . '</a></div>';
                                            break;

                                        case 'title':
                                            echo '<h3 class="h3subtitusara margin-space" style="font-size:30px">' . $product->name . '</h3>';
                                            break;

                                        case 'add-to-cart':
                                            woocommerce_template_loop_add_to_cart();
                                            break;

                                        case 'category':
                                            //CATEGORIAS
                                            $terms = get_the_terms($product_id, 'product_cat');
                                            $cat = [];
                                            foreach ($terms as $v) {
                                                $cat[] = $v->name;
                                            }
                                            echo implode(" - ", $cat);
                                            break;

                                        default:
                                            echo empty($product->fields[$field]) ? '&nbsp;' : $product->fields[$field];
                                            break;
                                    }
                                    ?>
                                </td>
                                <?php
                                ++$index;
                            endforeach;
                            ?>

                        </tr>

                    <?php endforeach; ?>

                    <tr class="remove">
                    <!--<th>&nbsp;</th>-->
                        <?php
                        $index = 0;
                        foreach ($products as $product_id => $product) :
                            $product_class = ( $index % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product_id
                            ?>
                            <td class="<?php echo $product_class; ?>" style="text-align: right">
                                <a href="<?php echo add_query_arg('redirect', 'view', $this->remove_product_url($product_id)) ?>" data-product_id="<?php echo $product_id; ?>"><?php _e('Remove', 'yith-woocommerce-compare') ?> <span class="remove">x</span></a>
                            </td>
                            <?php
                            ++$index;
                        endforeach;
                        ?>
                    </tr>

                    <?php if ($repeat_price == 'yes' && isset($fields['price'])) : ?>
                        <tr class="price repeated">
                            <!--<th><?php //echo $fields['price']         ?></th>-->

                            <?php
                            $index = 0;
                            foreach ($products as $product_id => $product) :
                                $product_class = ( $index % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product_id
                                ?>
                                <td class="<?php echo $product_class ?>"><?php echo $product->fields['price'] ?></td>
                                <?php
                                ++$index;
                            endforeach;
                            ?>

                        </tr>
                    <?php endif; ?>

                    <?php if ($repeat_add_to_cart == 'yes' && isset($fields['add-to-cart'])) : ?>
                        <tr class="add-to-cart repeated">
                            <!--<th><?php //echo $fields['add-to-cart']         ?></th>-->

                            <?php
                            $index = 0;
                            foreach ($products as $product_id => $product) :
                                $product_class = ( $index % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product_id
                                ?>
                                <td class="<?php echo $product_class ?>">
                                    <?php woocommerce_template_loop_add_to_cart(); ?>
                                </td>
                                <?php
                                ++$index;
                            endforeach;
                            ?>

                        </tr>
                    <?php endif; ?>

                    <!-- VARIABLES SARA -->
                    <!--<tr>-->
                        <!--<th>SARA</th>-->

                    <?php
//                        $index = 0;
//                        foreach ($products as $product_id => $product) :
//                            $product_class = ( $index % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product_id
//                            
                    ?>
                                            <!--<td class="<?php //echo $product_class     ?>" style="vertical-align: top">-->
                    <!--<div class="compareProduct">-->
                    <?php //= do_shortcode('[get_horse_features horseID=' . $product_id . ']');  ?>
                    <!--</div>-->
                    <!--</td>-->
                    <?php
//                            ++$index;
//                        endforeach;
                    ?>

                    <!--</tr>-->

                <?php endif; ?>

            </tbody>
        </table>


        <!--VARIABLES SARA -->
        <div class="comparesara">
            <?php
            $varIdsProducts = [];
            foreach ($products as $product_id => $product) {
                $varIdsProducts[] = $product_id;
            }
            do_shortcode('[get_horse_features_compare horseIDs=' . implode(",", $varIdsProducts) . ']');
            ?>
        </div>
        <?php do_action('yith_woocompare_after_main_table'); ?>

    </div>

    <?php if (wp_script_is('responsive-theme', 'enqueued')) wp_dequeue_script('responsive-theme') ?><?php if (wp_script_is('responsive-theme', 'enqueued')) wp_dequeue_script('responsive-theme') ?>
    <?php print_footer_scripts(); ?>

    <script type="text/javascript">

        jQuery(document).ready(function ($) {
            $('a').attr('target', '_parent');

            var oTable;
            $('body').on('yith_woocompare_render_table', function () {

                var t = $('table.compare-list');

                if (typeof $.fn.DataTable != 'undefined' && typeof $.fn.imagesLoaded != 'undefined' && $(window).width() > 767) {
                    t.imagesLoaded(function () {
                        oTable = t.DataTable({
                            'info': false,
                            'scrollX': true,
                            'scrollCollapse': true,
                            'paging': false,
                            'ordering': false,
                            'searching': false,
                            'autoWidth': false,
                            'destroy': true,
                            'fixedColumns': true
                        });
                    });
                }
            }).trigger('yith_woocompare_render_table');

            // add to cart
            var redirect_to_cart = false,
                    body = $('body');

            // close colorbox if redirect to cart is active after add to cart
            body.on('adding_to_cart', function ($thisbutton, data) {
                if (wc_add_to_cart_params.cart_redirect_after_add == 'yes') {
                    wc_add_to_cart_params.cart_redirect_after_add = 'no';
                    redirect_to_cart = true;
                }
            });

            body.on('wc_cart_button_updated', function (ev, button) {
                $('a.added_to_cart').attr('target', '_parent');
            });

            // remove add to cart button after added
            body.on('added_to_cart', function (ev, fragments, cart_hash, button) {

                $('a').attr('target', '_parent');

                if (redirect_to_cart == true) {
                    // redirect
                    parent.window.location = wc_add_to_cart_params.cart_url;
                    return;
                }

                // Replace fragments
                if (fragments) {
                    $.each(fragments, function (key, value) {
                        $(key, window.parent.document).replaceWith(value);
                    });
                }
            });

            // close window
            $(document).on('click', 'a.close', function (e) {
                e.preventDefault();
                window.close();
            });

            $(window).on('resize yith_woocompare_product_removed', function () {
                $('body').trigger('yith_woocompare_render_table');
            });

        });

    </script>

</body>
</html>