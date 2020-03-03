<?php
/**
 * CARGA EL IDIOMA DESDE EL THEMA HIJO
 */
add_action('after_setup_theme', 'my_child_theme_setup');

function my_child_theme_setup() {
    load_child_theme_textdomain('horseclub', get_stylesheet_directory() . '/languages');

    //OVERRIDE MENU
    class horseclub_bootstrap_navwalker_childtheme extends Walker_Nav_Menu {

        public function start_lvl(&$output, $depth = 0, $args = array()) {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul role=\"menu\" class=\" sf-dropdown-menu\">\n";
        }

        public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
            $indent = ( $depth ) ? str_repeat("\t", $depth) : '';

            if (strcasecmp($item->attr_title, 'divider') == 0 && $depth === 1) {
                $output .= $indent . '<li role="presentation" class="divider">';
            } else if (strcasecmp($item->title, 'divider') == 0 && $depth === 1) {
                $output .= $indent . '<li role="presentation" class="divider">';
            } else if (strcasecmp($item->attr_title, 'dropdown-header') == 0 && $depth === 1) {
                $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr($item->title);
            } else if (strcasecmp($item->attr_title, 'disabled') == 0) {
                $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr($item->title) . '</a>';
            } else if (strcasecmp($item->title, 'menuicon') == 0) {
                $output .= $indent . '<li role="presentation" class="menu_icon"><a href="' . $item->url . '"><i class="fa ' . esc_attr($item->attr_title) . '"></i></a>';
            } else if (strcasecmp($item->title, 'menuflag') == 0) {
                $output .= $indent . '<li role="presentation" class="menu_icon"><a href="' . $item->url . '">'
                        . '<img src="' . esc_attr($item->attr_title) . '"></img>'
                        . '<span class="tituMenuIcon">' . esc_attr($item->description) . '</span>'
                        . '</a>';
            } else {

                $class_names = $value = '';

                $classes = empty($item->classes) ? array() : (array) $item->classes;
                $classes[] = 'menu-item-' . $item->ID;

                $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

                if ($args->has_children)
                    $class_names .= ' sf-dropdown';

                if (in_array('current-menu-item', $classes))
                    $class_names .= ' active';

                $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

                $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
                $id = $id ? ' id="' . esc_attr($id) . '"' : '';

                $output .= $indent . '<li' . $id . $value . $class_names . '>';

                $atts = array();
                $atts['title'] = !empty($item->title) ? $item->title : '';
                $atts['target'] = !empty($item->target) ? $item->target : '';
                $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';

                if ($args->has_children && $depth === 0) {
                    $atts['href'] = !empty($item->url) ? $item->url : '';
                    $atts['class'] = 'dropdown-toggle';
                    $atts['aria-haspopup'] = 'false';
                } else {
                    $atts['href'] = !empty($item->url) ? $item->url : '';
                }

                $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

                $attributes = '';
                foreach ($atts as $attr => $value) {
                    if (!empty($value)) {
                        $value = ( 'href' === $attr ) ? esc_url($value) : esc_attr($value);
                        $attributes .= ' ' . $attr . '="' . $value . '"';
                    }
                }

                $item_output = $args->before;

                if (!empty($item->attr_title))
                    $item_output .= '<a' . $attributes . '><i class="fa ' . esc_attr($item->attr_title) . '"></i>&nbsp;';
                else
                    $item_output .= '<a' . $attributes . '>';

                $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
                $item_output .= '</a>';
                $item_output .= $args->after;

                $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
            }
        }

        public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output) {
            if (!$element)
                return;

            $id_field = $this->db_fields['id'];

            if (is_object($args[0]))
                $args[0]->has_children = !empty($children_elements[$element->$id_field]);

            parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
        }

        public static function fallback($args) {
            if (current_user_can('manage_options')) {

                extract($args);

                $fb_output = null;

                if ($container) {
                    $fb_output = '<' . $container;

                    if ($container_id)
                        $fb_output .= ' id="' . $container_id . '"';

                    if ($container_class)
                        $fb_output .= ' class="' . $container_class . '"';

                    $fb_output .= '>';
                }

                $fb_output .= '<ul';

                if ($menu_id)
                    $fb_output .= ' id="' . $menu_id . '"';

                if ($menu_class)
                    $fb_output .= ' class="' . $menu_class . '"';

                $fb_output .= '>';
                $fb_output .= '<li><a href="' . admin_url('nav-menus.php') . '">Add a menu</a></li>';
                $fb_output .= '</ul>';

                if ($container)
                    $fb_output .= '</' . $container . '>';

                echo $fb_output;
            }
        }

    }

    //OVERRIDE GRID PORTFOLIO
    add_shortcode('horseclub_grid_portofoliio_home', 'get_horseclub_grid_portofoliio_home');

    function get_horseclub_grid_portofoliio_home($atts, $content = null) {

        extract(shortcode_atts(array(
            'el_position' => '',
            'porcol' => '',
            'nospace' => '',
            'perpage' => '',
            'port_category' => '',
            'filter' => '',
            'show_more_grid' => '',
            'gridporhover' => '',
            'filter_posit' => '',
            'gridporlayout' => false,
            'ppta' => '',
            'gpbtn' => '',
            'pgall' => 'ALL',
            'pgsm' => 'SHOW MORE'
                        ), $atts));
        global $wp_query;
        $sghover = $pptalg = '';
        $sghover = "";
        $fpos = '';
        if ($gridporhover != "") {
            $sghover = $gridporhover;
        }
        if ($filter_posit != "") {
            $fpos = $filter_posit;
        }
        if ($ppta != "") {
            $pptalg = 'center';
        }
        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }
        $curpage = $paged ? $paged : 1;
        
        $args = array(
            'post_type' => 'portfolio',
            'orderby' => 'rand',
            'portfolio-type' => $port_category,
            'posts_per_page' => $perpage,
            'paged' => $paged
        );
        if ($port_category = "") {
            $port_category = '';
        }
        global $wp_query;

        $taxonomy = 'portfolio-type';
        $terms = get_terms($taxonomy);
        $space = "";
        if ($nospace != "") {
            $space = $nospace;
        }
        $output = '';
        $output .= '<div class="container_r">';
        if ($filter == "yes") {
            $output .= '<div class="filter_wrap ' . $fpos . '">';
            $output .= '<ul id="up_filters" class="clearfix ' . $space . '">';
            $output .= '<li><span class="filter active" data-filter="all">' . $pgall . '</span></li>';
            $count = count($terms);
            $i = 0;
            if ($count > 0) {
                foreach ($terms as $term) {
                    $i++;
                    $output .= '<li><span class="filter" data-filter="' . $term->term_id . '">' . $term->name . '</span></li>';
                }
            }
            $output .= '</ul>';
            $output .= '</div>';
        }
        $output .= '<div id="portfoliolist">';
        query_posts($args);
        if (have_posts()) : while (have_posts()) : the_post();
                $terms = wp_get_post_terms(get_the_ID(), 'portfolio-type');
                if ($porcol == '1') {
                    $columnnum = 'onecolumn';
                    $imgwidth = 1150;
                    $imgheight = 643;
                    $sliderheight = 643;
                } else if ($porcol == '2') {
                    $columnnum = 'p2';
                    $imgwidth = 600;
                    $imgheight = 600;
                    $sliderheight = 600;
                } else if ($porcol == '3') {
                    $columnnum = 'p3';
                    $imgwidth = 400;
                    $imgheight = 400;
                    $sliderheight = 400;
                } else if ($porcol == '4wide') {
                    $columnnum = 'p4w';
                    $imgwidth = 650;
                    $imgheight = 650;
                    $sliderheight = 650;
                } else if ($porcol == '5wide') {
                    $columnnum = 'p5w';
                    $imgwidth = 600;
                    $imgheight = 600;
                    $sliderheight = 600;
                } else if ($porcol == '3wide') {
                    $columnnum = 'p3w';
                    $imgwidth = 700;
                    $imgheight = 700;
                    $sliderheight = 700;
                } else {
                    $columnnum = 'p4';
                    $imgwidth = 400;
                    $imgheight = 400;
                    $sliderheight = 400;
                }

                $thumb = get_post_thumbnail_id();
                $img_url = wp_get_attachment_url($thumb, 'full');
                $image = horseclub_resize($img_url, $imgwidth, $imgheight, true);

                foreach ($terms as $term) {
                    $k = 1;
                    if (count($terms) != $k) {
                        $output .= ' ';
                    }
                    $k++;
                }
                $output .= "<div class='mix portfolio ";
                foreach ($terms as $term) {
                    $output .= "$term->term_id ";
                }
                ;
                $output .= "$columnnum ";
                $output .= "$space";
                $output .= "'> ";

                $output .= '<div class="portfolio-wrapper ' . $sghover . '">';

                if ($image) {
                    $output .= '<img width="' . $imgwidth . '" height="' . $imgheight . '" src="' . $image . '" alt="' . get_the_title() . '" >';
                } else {
                    $output .= '<img src="' . get_template_directory_uri() . '/assets/img/no-thumbs.png" alt="No Image">';
                }

                if ($gridporlayout == true) {

                    $output .= '<div class="label-pp"><div class="label-text"><div class="mrko">';
                    if (empty($gpbtn)) {
                        $output .= ' <a class="image-popup-no-margins up-button  port_but"  href="' . $img_url . '"><span><i class="fa fa-expand"></i></span></a>';
                        $output .= ' <a class="up-button  port_but"  href="' . get_permalink(get_the_ID()) . '"><span><i class="fa fa-link"></i></span></a>';
                    }
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '<div class="bottom-pp ' . $pptalg . '">';
                    $output .= '<a href="' . get_permalink(get_the_ID()) . '">';
                    $output .= '<div class="text-title">' . get_the_title() . '</div>';
                    $output .= '</a>';
                    $output .= '<span class="text-category">';
                    $k = 1;
                    foreach ($terms as $term) {
                        $output .= "$term->name";
                        if (count($terms) != $k) {
                            $output .= ', ';
                        }
                        $k++;
                    }
                    $output .= '</span>';
                    $output .= '</div>';
                    $output .= '</div>';
                } else {
                    $output .= '<div class="label-pp"><div class="label-text"><div class="mrko"><div class="mrko_iner">';
                    $output .= '<a href="' . get_permalink(get_the_ID()) . '">';
                    $output .= '<div class="text-title">' . get_the_title() . '</div>';
                    $output .= '</a>';
                    $output .= '<span class="text-category">';
                    $k = 1;
                    foreach ($terms as $term) {
                        $output .= "$term->name";
                        if (count($terms) != $k) {
                            $output .= ', ';
                        }
                        $k++;
                    }
                    $output .= '</span>';
//$output .='<div class="line"></div>';
                    if (empty($gpbtn)) {
                        $output .= ' <a class="image-popup-no-margins up-button  port_but"  href="' . $img_url . '"><span><i class="fa fa-expand"></i></span></a>';
                        $output .= ' <a class="up-button  port_but"  href="' . get_permalink(get_the_ID()) . '"><span><i class="fa fa-link"></i></span></a>';
                    }
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';

                    $output .= '</div>';

                    $output .= '</div>';
                }
            endwhile;
        else:
            ?>
            <p><?php esc_html__('Sorry, no posts matched your criteria.', 'horseclub'); ?></p>
        <?php
        endif;

        $output .= '</div>';
        $output .= '</div>';

        if ($show_more_grid == "yes") {
            if (get_next_posts_link()) {
                $output .= '<div class="grid_port_paging"><span rel="' . $wp_query->max_num_pages . '" class="loading_more">' . get_next_posts_link($pgsm) . '</span></div>';
            }
        }
        wp_reset_query();
        return $output;
    }

}

/**
 * FUNCION PARA EL TITULO DE LOS PRODUCTOS
 */
function equinetics_switch_loop_title() {
    remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
    add_action('woocommerce_before_shop_loop_item_title', 'equinetics_template_loop_product_title', 10);
}

add_action('woocommerce_before_shop_loop_item', 'equinetics_switch_loop_title');

function equinetics_template_loop_product_title() {
    global $product;
    echo '<h2 class="woocommerce-loop-product__title titleproduct">' . get_the_title() . '</h2>';
    //echo '<span class="shortdesc">' . $product->short_description . '</span>';
}

/**
 * FUNCION PARA QUITAR EL PRECIO DE LOS PRODUCTOS
 */
function equinetics_switch_loop_price() {
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
    add_action('woocommerce_before_shop_loop_item_title', 'equinetics_template_single_price', 10);
}

add_action('woocommerce_before_shop_loop_item', 'equinetics_switch_loop_price');

function equinetics_template_single_price() {
    global $product;
}

/**
 * FUNCION PARA EL BOTON AGREGAR AL CARRITO
 */
function equinetics_switch_loop_add_to_cart() {
    //remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
    add_action('woocommerce_before_shop_loop_item_title', 'equinetics_woocommerce_template_loop_add_to_cart', 10);
}

add_action('woocommerce_before_shop_loop_item', 'equinetics_switch_loop_add_to_cart');

function equinetics_woocommerce_template_loop_add_to_cart($args = array()) {
    global $product;
}

/**
 * CAMBIAR ORDEN DE LAS COSAS EN LOS PRODUCTOS
 */
add_action('arrange_view_product', 'override_order_view_product');
do_action('arrange_view_product');

function override_order_view_product() {
    //REMUEVO LA ACCIONES DEL CORE
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
    //SOBRE ESCRIBO LAS ACCIONES Y PESOS DEL CORE
    add_action('woocommerce_single_product_summary', 'equinetics_woocommerce_template_single_title', 5);
    //add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 70);
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 80);
}

function equinetics_woocommerce_template_single_title() {
    the_title('<h1 class="vc_custom_heading text space text-center">', '</h1>');
    echo '<div class="vc_separator wpb_content_element vc_separator_align_center 
        vc_sep_width_20 vc_sep_double vc_sep_pos_align_center underlined_title_red 
        vc_separator-has-text"><span class="vc_sep_holder vc_sep_holder_l">
        <span style="border-color:#be1e2d;" class="vc_sep_line">
        </span>
        </span>
        <h4>Subrayado</h4>
        <span class="vc_sep_holder vc_sep_holder_r">
        <span style="border-color:#be1e2d;" class="vc_sep_line">
        </span>
        </span>
        <div>
        </div>
        </div>';
    echo '<div class="vc_empty_space" style="height: 20px"><span class="vc_empty_space_inner"></span></div>';
}

function my_text_strings($translated_text, $text, $domain) {
    switch ($translated_text) {
        case "Añadir al carrito":
            $translated_text = __('Contratar servicio', 'woocommerce');
            break;
        case "Productos relacionados":
            $translated_text = __('Otros profesionales', 'woocommerce');
            break;
        default:
            break;
    }
    return $translated_text;
}

add_filter('gettext', 'my_text_strings', 20, 3);

add_filter('wc_add_to_cart_message', 'wdo_custom_wc_add_to_cart_message', 10, 2);

function wdo_custom_wc_add_to_cart_message($message, $product_id) {
    $message = sprintf(esc_html__('Has solicitado un servicio de « %s ».', 'tm-organik'), get_the_title($product_id));
    return $message;
}

add_action('show_user_profile', 'agregar_campos_perfil');
add_action('edit_user_profile', 'agregar_campos_perfil');
add_action('personal_options_update', 'guardar_campos_perfil');
add_action('edit_user_profile_update', 'guardar_campos_perfil');

function agregar_campos_perfil($user) {
    $id_product = esc_attr(get_the_author_meta('id_product', $user->ID));
    $type_product = esc_attr(get_the_author_meta('type_product', $user->ID));
    ?>

    <h3>Campos adicionales</h3>
    <?= $type_product ?>
    <table class="form-table">
        <tr>
            <th><label for="id_product">ID de producto</label></th>
            <td>
                <input type="text" name="id_product" id="id_product" class="input" value="<?php echo $id_product; ?>" size="20" />
                <span class="description">ID de producto</span>
            </td>
        </tr>
        <tr>
            <th><label for="id_product">Tipo de producto</label></th>
            <td>
                <select name="type_product" id="type_product">
                    <option value=""></option>
                    <option  <?= $type_product == 'veterinario' ? 'selected' : '' ?> value="veterinario">Veterinario</option>
                    <option  <?= $type_product == 'caballo' ? 'selected' : '' ?> value="caballo">Caballo</option>					
                </select>                
                <span class="description">Tipo de producto</span>
            </td>
        </tr>		
    </table>

    <?php
}

function guardar_campos_perfil($user_id) {
    if (isset($_POST['id_product']) && isset($_POST['type_product'])) {
        update_user_meta($user_id, 'id_product', $_POST['id_product']);
        update_user_meta($user_id, 'type_product', $_POST['type_product']);
    }
}

function shortcode_cleaner() {
    remove_shortcode('add_to_cart'); // Not exactly required
    add_shortcode('add_to_cart', 'my_add_to_cart_shortcode');
}

function my_add_to_cart_shortcode($atts) {
    global $post;

    if (empty($atts)) {
        return '';
    }

    $atts = shortcode_atts(array(
        'id' => '',
        'class' => '',
        'quantity' => '1',
        'sku' => '',
        'style' => 'border:4px solid #ccc; padding: 12px;',
        'show_price' => 'true',
            ), $atts, 'product_add_to_cart');

    if (!empty($atts['id'])) {
        $product_data = get_post($atts['id']);
    } elseif (!empty($atts['sku'])) {
        $product_id = wc_get_product_id_by_sku($atts['sku']);
        $product_data = get_post($product_id);
    } else {
        return '';
    }

    $product = is_object($product_data) && in_array($product_data->post_type, array('product', 'product_variation'), true) ? wc_setup_product_data($product_data) : false;

    if (!$product) {
        return '';
    }

    ob_start();

    echo '<p class="product woocommerce add_to_cart_inline ' . esc_attr($atts['class']) . '" style="' . ( empty($atts['style']) ? '' : esc_attr($atts['style']) ) . '">';

    woocommerce_template_loop_add_to_cart(array(
        'quantity' => $atts['quantity'],
    ));

    if (wc_string_to_bool($atts['show_price'])) {
        // @codingStandardsIgnoreStart
        echo $product->get_price_html();
        // @codingStandardsIgnoreEnd
    }

    echo '</p>';

    // Restore Product global in case this is shown inside a product post.
    wc_setup_product_data($post);

    return ob_get_clean();
}

add_action('init', 'shortcode_cleaner');


add_filter('woocommerce_account_menu_items', 'add_links');

function add_links($menu_links) {

    $cu = wp_get_current_user();
    $id_product = esc_attr(get_the_author_meta('id_product', $cu->ID));
    if (!empty($id_product)) {
        $new = array('reportes' => 'Reportes');
        $menu_links = array_slice($menu_links, 0, 1, true) + $new + array_slice($menu_links, 1, NULL, true);
    }
    return $menu_links;
}

add_action('init', 'my_add_shortcodes');

function my_add_shortcodes() {

    add_shortcode('my-login-form', 'my_login_form_shortcode');
}

function my_login_form_shortcode() {

    if (is_user_logged_in()) {
        global $current_user;
        wp_get_current_user();
        $html = "<div class='sarafree'><p class='text-center'><b>Hola, </b> " . $current_user->display_name . "</p>";
        $html .= "Ya puedes acceder a todos los beneficios de";
        $html .= " nuestro software</div>";
        $html .= "<div class='saraAccount logged'><a href='cruza'>Acceder a S. A. R. A. </a></div>";
    } else {
        $html = " <div class='sarafree'><a href='cruza'>Prueba S. A. R. A. <br /> (Sin crear una cuenta) </a></div>";
        $html .= "<div class='saraAccount'><a href='mi-cuenta'>¡Crea una cuenta gratis!</a> y accede a todos los beneficios del software. </div>";
        if ($_GET['login'] == "failed") {
            $html .= "<div style='border-left: 4px solid #be1e2d;
                        width: 60%;
                        padding: 12px;
                        margin: 10px auto;
                        background-color: #fff;
                        box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);'><strong>ERROR</strong>: 
                        Nombre de usuario no válido. </div>";
        }
        $html .= wp_login_form(array('echo' => false, 'form_id' => 'logincruza'));
    }
    return $html;
}

//add_action('wp_login_failed', 'pippin_login_fail');  // hook failed login

function pippin_login_fail($username) {
    $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
    // if there's a valid referrer, and it's not the default log-in screen
    if (!empty($referrer) && !strstr($referrer, 'wp-login') && !strstr($referrer, 'wp-admin')) {
        wp_redirect(site_url('/software-de-cruza/') . '/?login=failed');  // let's append some information (login=failed) to the URL for the theme to use
        exit;
    }
}

//FUNCION PARA CAMBIAR EL ENLACE DE LAS BUSQUEDAS Y QUE VAYA AL PORTAFOLIO
if ( ! function_exists( 'woocommerce_template_loop_product_link_open' ) ) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function woocommerce_template_loop_product_link_open() {
		
	//var_dump(get_the_ID());
		echo '<a href="hola" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';
	}
}
