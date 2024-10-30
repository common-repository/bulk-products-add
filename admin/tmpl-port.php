<?php
global $itls_bulkproductsadd_x1x_data;

    $tmp_arr_items  = array();
    //$itls_bulkproductsadd_x1x_array = get_option($itls_bulkproductsadd_x1x_data['options_name']);

?>

	<div class="wrap">
	    <div class="itls-left">

      <h2><?php
        //echo $itls_bulkproductsadd_x1x_data['admin_submenu_port']['page_title']
        echo 'Add new products in bulk';
        ?>
      </h2>

        <form action="<?php echo admin_url('edit.php?post_type=product&page=bulk-add-new-product'); ?>" method="post">
            <div>
                <table>

                  <tr>
                      <td>
                      <label for="qtPostStatus">Product Publish Status</label>
                      </td>
                  </tr>
                  <tr>
                      <td>

                       <select name ="qtPostStatus" id="qtPostStatus">
                         <option value="draft">Draft</option>
                         <option value="publish">Publish</option>
                       </select>

                      </td>
                  </tr>

                  <tr>
                      <td>
                      <label for="qtPostStock">Product Stock Status</label>
                      </td>
                  </tr>
                  <tr>
                      <td>

                       <select name ="qtPostStock" id="qtPostStock">
                         <option value="outofstock">Out of Stock</option>
                         <option value="instock">In Stock</option>
                       </select>

                      </td>
                  </tr>

                  <tr>
                      <td>
                      <label for="qtSKU">Product SKU Pattern</label>
                      </td>
                  </tr>
                  <tr>
                      <td>

 <input type="text" id="qtSKU" name="qtSKU">

                      </td>
                  </tr>

                    <tr>
                        <td>
                        <label for="qtBulkPages">Products Name (one per line!)</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <textarea name="qtBulkPages" id="qtBulkPages" rows=6 cols=40></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>
                        <label for="qtPageContent">Products Description (copy/paste) or leave empty.</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <textarea name="qtPageContent" id="qtPageContent" rows=6 cols=40></textarea>
                        </td>
                    </tr>

                </table>
            </div>

            <input type="hidden" name="itls_bulkproductsadd_port" value="true" />
            <p class="submit">
                <input type="submit" class="button-primary" value="Add Products in Bulk" />
            </p>

        </form>
        </div>
	    <div class="itls-right itls-postbox itls-text-center">
<?php

foreach ($itls_bulkproductsadd_x1x_data['owner'] as $t) {
    $tmp_res = null;
    $tmp_tag = 'p';
    if (isset($t['info'])) {
        $tmp_res = $t['info'];
    }
    if (isset($t['img'])) {
        $tmp_res = '<img src="'.$t['img'].'" alt="" />';
    }
    if (isset($t['link'])) {
        //$tmp_z = 'Bulk Products Adder for WooCommerce';
        //$tmp_res = '<a href="'.$t['link'].'">'.$tmp_z.'</a>';
    }
    if (isset($t['tag'])) {
        $tmp_tag = $t['tag'];
    }
    if (isset($t['label'])) {
        $tmp_res = $t['label'].' '.$tmp_res;
    }
    $tmp_res = '<'.$tmp_tag.'>'.$tmp_res.'</'.$tmp_tag.'>';
    echo $tmp_res;
}

?>
            <p></p>

	    </div>

  </div>
