<?php

if (!class_exists('WP_List_Table')) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * List table class
 */
class Profesionales_List_Table extends \WP_List_Table {

    function __construct() {
        parent::__construct(array(
            'singular' => 'profesional',
            'plural' => 'profesionales',
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
        _e('Profesionales no encontrados', 'wedevs');
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
            case 'nombre':
                return $item->nombre;

            case 'direccion':
                return $item->direccion;

            case 'correo':
                return $item->correo;

            case 'celular':
                return $item->celular;

            case 'profesion':
                return $item->profesion;

            case 'logo_imagen':
                if (empty($item->logo_imagen)) {
                    return '<img src="' . plugins_url("aliados-estrategicos/includes/views/resources/sin-imagen.png") . '" alt="Logo" style="width: 50px; border: 1px solid #ccc; padding: 5px;" />';
                } else {
                    return '<img src="' . $item->logo_imagen . '" alt="Logo" style="width: 50px; border: 1px solid #ccc; padding: 5px;" />';
                }

            case 'activo':
                return $item->activo == '1' ? 'SI' : 'NO';

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
            'nombre' => __('Nombre', 'wedevs'),
            'direccion' => __('Direcci&oacute;n', 'wedevs'),
            'correo' => __('Correo electr&oacute;nico', 'wedevs'),
            'celular' => __('Celular', 'wedevs'),
            'profesion' => __('Profesión', 'wedevs'),
            'logo_imagen' => __('Logo o imagen', 'wedevs'),
            'activo' => __('Activo', 'wedevs'),
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
        $actions['edit'] = sprintf('<a href="%s" data-id="%d" title="%s">%s</a>', admin_url('admin.php?page=profesionales&action=edit&id=' . $item->id), $item->id, __('Edit this item', 'wedevs'), __('Edit', 'wedevs'));
        $actions['delete'] = sprintf('<a href="%s" class="submitdelete" data-id="%d" title="%s">%s</a>', admin_url('admin.php?page=profesionales&action=delete&id=' . $item->id), $item->id, __('Delete this item', 'wedevs'), __('Delete', 'wedevs'));

        return sprintf('<a href="%1$s"><strong>%2$s</strong></a> %3$s', admin_url('admin.php?page=profesionales&action=view&id=' . $item->id), $item->nombre, $this->row_actions($actions));
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
                '<input type="checkbox" name="profesional_id[]" value="%d" />', $item->id
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

        $this->items = profesional_get_all_profesional($args);

        $this->set_pagination_args(array(
            'total_items' => profesional_get_profesional_count(),
            'per_page' => $per_page
        ));
    }

}
