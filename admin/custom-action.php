<?php

function itls_bulkproductsadd_cus_action()
{
    //global $background_process;
    //global $itls_bulkproductsadd_x1x_data;
    //$itls_bulkproductsadd_x1x_array = get_option($itls_bulkproductsadd_x1x_data['options_name']);

    $data = $_POST;

    $tmp_xcontent = stripslashes(esc_textarea($data['qtPageContent']));

    $tmp_xpages = stripslashes(esc_textarea($data['qtBulkPages']));

    $tmp_xpstatus = $data['qtPostStatus'];

    $tmp_xpstock = $data['qtPostStock'];

    $tmp_xpsku = $data['qtSKU'];


    $ids = explode(PHP_EOL, $tmp_xpages);


    if (is_admin()) {
        $ii = 0;

        foreach ($ids as $tmp_name) {
            $tmp_name = preg_replace('/[^\s\p{L}]/u', '', $tmp_name);
            if ($tmp_name=='' || empty($tmp_name)) {
                continue;
            }

            $ii++;
            $tmp_skuCalc = '';
            if ($tmp_xpsku) {
                $tmp_skuCalc = $tmp_xpsku.$ii;
            }

            //qtAddProduct('wwww', '', 'draft', 'outofstock', '');

            qtAddProduct($tmp_name, $tmp_xcontent, $tmp_xpstatus, $tmp_xpstock, $tmp_skuCalc);

            echo $tmp_name." Added!<br />";
        }
    }

    echo '<a  class="button-primary" href="'.admin_url().'edit.php?post_type=product">Done!</a>';
    //exit;
}

function qtAddProduct($qt_page_title, $qt_page_content, $tmp_xpstatus, $tmp_xpstock, $tmp_skuCalc)
{
    $qt_slug        = qtSlugify($qt_page_title);
    $qt_page_check  = get_page_by_title($qt_page_title);
    $qt_page        = array(
        'post_type' => 'product',
        'post_title' => $qt_page_title,
        'post_parent' => '',
        'post_status' => $tmp_xpstatus,
        'post_content' => $qt_page_content,
        'post_slug' => $qt_slug
    );
    //if (!isset($qt_page_check->ID)) {
    $post_id = wp_insert_post($qt_page);
    //}

    wp_set_object_terms($post_id, 'simple', 'product_type');

    update_post_meta($post_id, '_stock_status', $tmp_xpstock);

    update_post_meta($post_id, '_visibility', 'visible');

    update_post_meta($post_id, '_price', 0);
    update_post_meta($post_id, '_regular_price', 0);

    //update_post_meta( $post_id, '_price', "1" );
    //update_post_meta( $post_id, '_regular_price', "1" );
    update_post_meta($post_id, 'total_sales', '0');
    update_post_meta($post_id, '_downloadable', 'no');
    update_post_meta($post_id, '_virtual', 'no');
    update_post_meta($post_id, '_purchase_note', "");
    update_post_meta($post_id, '_featured', "no");
    update_post_meta($post_id, '_sold_individually', "");
    update_post_meta($post_id, '_manage_stock', "no");
    update_post_meta($post_id, '_backorders', "no");
    update_post_meta($post_id, '_stock', "");

    update_post_meta($post_id, '_sku', $tmp_skuCalc);
}


function qtSlugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}
