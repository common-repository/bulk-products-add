<?php

add_action('admin_menu', 'add_products_menu_entry', 22);

function add_products_menu_entry()
{
    add_submenu_page(
        'edit.php?post_type=product',
        __('Products Bulk Add'),
        __('Bulk Add New'),
        'manage_woocommerce',
        'bulk-add-new-product',
        'itls_bulkproductsadd_port_page'
    );
}

function itls_bulkproductsadd_port_page()
{
    global $itls_bulkproductsadd_x1x_data;

    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    if (isset($_POST['itls_bulkproductsadd_port']) && $_POST['itls_bulkproductsadd_port'] === 'true') {
        include_once('custom-action.php');
        itls_bulkproductsadd_cus_action();
    } else {
        include_once('tmpl-port.php');
    }
}
