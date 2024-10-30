<?php

function itls_reg_admin_js() {
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'bulkproductsadd-custom-script-handle', plugins_url('/assets/js/admin.js', __FILE__), array('jquery'), 1, true );
    wp_enqueue_style( 'bulkproductsadd-admin-style', plugins_url('/assets/css/admin.css', __FILE__), null );
}
add_action( 'admin_enqueue_scripts', 'itls_reg_admin_js' );
