<?php

if (!class_exists('WP_List_Table')) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * List table class
 */
class Aliados_List_Table extends \WP_List_Table {

    function __construct() {
        parent::__construct(array(
            'singular' => 'aliado',
            'plural' => 'aliados',
            'ajax' => false
        ));
    }

    function get_table_classes() {
        return array('widefat', 'fixed', 'striped', $this->_args['plural']);
    }

    /**
     * Message to show if no designation found
     *
     * @return void
     */
    function no_items() {
        _e('Aliados no encontrados', 'wedevs');
    }

    /**
     * Default column values if no callback found
     *
     * @param  object  $item
     * @param  string  $column_name
     *
     * @return string
     */
    function column_default($item, $column_name) {

        switch ($column_name) {
            case 'tipo':
                return $item->tipo;
                
            case 'nombre':
                return $item->nombre;

            case 'url':
                return $item->url;

            case 'descripcion_corta':
                return substr($item->descripcion_corta, 0, 20) . '...';

            case 'descripcion_larga':
                return substr($item->descripcion_larga, 0, 20) . '...';

            case 'telefono':
                return $item->telefono;
                
            case 'email':
                return $item->email;

            case 'direccion':
                return $item->direccion;

            case 'latitud':
                return $item->latitud;

            case 'longitud':
                return $item->longitud;

            case 'logo_imagen':
                if (empty($item->logo_imagen)) {
                    return '<img src="' . plugins_url("aliados-estrategicos/includes/views/resources/sin-imagen.png") . '" alt="Logo" style="width: 50px; border: 1px solid #ccc; padding: 5px;" />';
                } else {
                    return '<img src="' . $item->logo_imagen . '" alt="Logo" style="width: 50px; border: 1px solid #ccc; padding: 5px;" />';
                }


            default:
                return isset($item->$column_name) ? $item->$column_name : '';
        }
    }

    /**
     * Get the column names
     *
     * @return array
     */
    function get_columns() {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'logo_imagen' => __('Logo o imagen', 'wedevs'),
            'tipo' => __('Tipo', 'wedevs'),
            'nombre' => __('Nombre', 'wedevs'),
            'url' => __('URL Sitio web', 'wedevs'),
            'descripcion_corta' => __('Descripci&oacute;n corta', 'wedevs'),
            'descripcion_larga' => __('Descripci&oacute;n larga', 'wedevs'),
            'telefono' => __('Tel&eacute;fono', 'wedevs'),
            'email' => __('Correo electr&oacute;nico', 'wedevs'),
            'direccion' => __('Direcci&oacute;n', 'wedevs'),
            'latitud' => __('Latitud', 'wedevs'),
            'longitud' => __('Longitud', 'wedevs'),
        );

        return $columns;
    }

    /**
     * Render the designation name column
     *
     * @param  object  $item
     *
     * @return string
     */
    function column_nombre($item) {

        $actions = array();
        $actions['edit'] = sprintf('<a href="%s" data-id="%d" title="%s">%s</a>', admin_url('admin.php?page=aliados&action=edit&id=' . $item->id), $item->id, __('Edit this item', 'wedevs'), __('Edit', 'wedevs'));
        $actions['delete'] = sprintf('<a href="%s" class="submitdelete" data-id="%d" title="%s">%s</a>', admin_url('admin.php?page=aliados&action=delete&id=' . $item->id), $item->id, __('Delete this item', 'wedevs'), __('Delete', 'wedevs'));

        return sprintf('<a href="%1$s"><strong>%2$s</strong></a> %3$s', admin_url('admin.php?page=aliados&action=view&id=' . $item->id), $item->nombre, $this->row_actions($actions));
    }

    /**
     * Get sortable columns
     *
     * @return array
     */
    function get_sortable_columns() {
        $sortable_columns = array(
            'name' => array('name', true),
        );

        return $sortable_columns;
    }

    /**
     * Set the bulk actions
     *
     * @return array
     */
    function get_bulk_actions() {
        $actions = array(
            'trash' => __('Move to Trash', 'wedevs'),
        );
        return $actions;
    }

    /**
     * Render the checkbox column
     *
     * @param  object  $item
     *
     * @return string
     */
    function column_cb($item) {
        return sprintf(
                '<input type="checkbox" name="aliado_id[]" value="%d" />', $item->id
        );
    }

    /**
     * Set the views
     *
     * @return array
     */
    public function get_views_() {
        $status_links = array();
        $base_link = admin_url('admin.php?page=sample-page');

        foreach ($this->counts as $key => $value) {
            $class = ( $key == $this->page_status ) ? 'current' : 'status-' . $key;
            $status_links[$key] = sprintf('<a href="%s" class="%s">%s <span class="count">(%s)</span></a>', add_query_arg(array('status' => $key), $base_link), $class, $value['label'], $value['count']);
        }

        return $status_links;
    }

    /**
     * Prepare the class items
     *
     * @return void
     */
    function prepare_items() {

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array($columns, $hidden, $sortable);

        $per_page = 20;
        $current_page = $this->get_pagenum();
        $offset = ( $current_page - 1 ) * $per_page;
        $this->page_status = isset($_GET['status']) ? sanitize_text_field($_GET['status']) : '2';

        // only ncessary because we have sample data
        $args = array(
            'offset' => $offset,
            'number' => $per_page,
        );

        if (isset($_REQUEST['orderby']) && isset($_REQUEST['order'])) {
            $args['orderby'] = $_REQUEST['orderby'];
            $args['order'] = $_REQUEST['order'];
        }

        $this->items = aliado_get_all_aliado($args);

        $this->set_pagination_args(array(
            'total_items' => aliado_get_aliado_count(),
            'per_page' => $per_page
        ));
    }

}
