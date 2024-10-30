<?php
/**
 * Plugin Name: Bulk Products Add
 * Plugin URI: https://www.ampae.com/wp/product-add-bulk-woocommerce
 * Description: Bulk Products Adder for WooCommerce. If you need to add multiple products this plugin will speed up products creation.
 * Author: ITLS
 * Author URI: https://twitter.com/MentorSaas
 * Version: 1.1
 * Requires at least: 4.4
 * Tested up to: 5.6
 * WC requires at least: 3.0
 * WC tested up to: 4.8
 *
 * Text Domain: itls-woo
 * Domain Path: /languages/
 *
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}




include_once('runtime/func.php');
$itls_bulkproductsadd_functions = new SunSet2Functions();

$itls_bx_data = array (
  'Version' => 'Version',
  'Author' => 'Author',
);

$plugin_data = get_file_data(__FILE__, $itls_bx_data, false);
$plugin_version = $plugin_data['Version'];

$itls_bulkproductsadd_x1x_data = array(

    'full_name'         => 'ProductsAddBulk',
    'full_author'       => $plugin_data['Author'],
    'version'           => $plugin_data['Version'],
/*
    'settings_version'  => '3',

    'menu_icon'         => 'dashicons-format-aside',
    'menu_position'     => '4.75',
*/
    'debug'             => false,

);

$itls_bulkproductsadd_x1x_data['owner'] = array(
        'logo'               => array(
            'img' => plugin_dir_url(__FILE__) . '/admin/assets/img/logo.png',
            'link' =>'#',
        ),
        'name'               => array(
            'label' => $itls_bulkproductsadd_x1x_data['full_name'],
            'tag' => 'h2',
        ),
        'ver'               => array(
            'label' => 'Version:',
            'info' => $itls_bulkproductsadd_x1x_data['version'],
        ),
);

// ---   -----------------------------------------------------------------------

$itls_bulkproductsadd_x1x_data['name']            = $itls_bulkproductsadd_functions->text2slug($itls_bulkproductsadd_x1x_data['full_name']);
$itls_bulkproductsadd_x1x_data['author']          = $itls_bulkproductsadd_functions->text2slug($itls_bulkproductsadd_x1x_data['full_author']);
$itls_bulkproductsadd_x1x_data['prefix']          = $itls_bulkproductsadd_x1x_data['author'].'_'.$itls_bulkproductsadd_x1x_data['name'];
$itls_bulkproductsadd_x1x_data['url_prefix']      = $itls_bulkproductsadd_x1x_data['author'].'-'.$itls_bulkproductsadd_x1x_data['name'];

$itls_bulkproductsadd_x1x_data['options_name']    = $itls_bulkproductsadd_x1x_data['prefix'].''.$itls_bulkproductsadd_x1x_data['settings_version'];
$itls_bulkproductsadd_x1x_data['settings_name']   = $itls_bulkproductsadd_x1x_data['prefix'].'_settings'.''.$itls_bulkproductsadd_x1x_data['settings_version'];

define(strtoupper($itls_bulkproductsadd_x1x_data['prefix']) . '_VERSION', $itls_bulkproductsadd_x1x_data['version'].time());

define(strtoupper($itls_bulkproductsadd_x1x_data['prefix']) . '_DIR', plugin_dir_path(__FILE__));
define(strtoupper($itls_bulkproductsadd_x1x_data['prefix']) . '_URL', plugin_dir_url(__FILE__));
define(strtoupper($itls_bulkproductsadd_x1x_data['prefix']) . '_DOMAIN', get_bloginfo('url'));
define(strtoupper($itls_bulkproductsadd_x1x_data['prefix']) . '_COOKIEPATH', '/');

if (is_admin()) {

    $itls_bulkproductsadd_x1x_options = array();

    include_once('admin/core.php');

    include_once('admin/render.php');
    $itls_bulkproductsadd_render = new SunSet4Render();

    include_once('admin/prerender.php');

    include_once('admin/scripts.php');
}

