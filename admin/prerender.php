<?php

if (!class_exists('ITLSbulkproductsaddPreRender')) {
    class ITLSbulkproductsaddPreRender
    {
        public function __construct()
        {
        }


        public function render_options($opt)
        {
            global $itls_bulkproductsadd_x1x_options, $itls_bulkproductsadd_render;

            $options = get_option($opt);

//            echo '<div id="itls-adm-contain"><div class="itls-adm-accordion">';

            foreach ($itls_bulkproductsadd_x1x_options as $tmp_tabs => $tmp_inna) {
                $tmp_tab_name = $tmp_inna['name'];

//                echo '<div id="itls-adm-'.$tmp_tabs.'"><a href="#itls-adm-'.$tmp_tabs.'" class="itls-adm-tab">'.$tmp_tab_name.'</a><div class="itls-adm-content"><table class="form-table">';

                echo '<div class="itls-adm-content"><table class="form-table">';


                foreach ($tmp_inna['options'] as $tmp_root => $tmp_ara) {
                    $tmp_print = '';
                    if (isset($tmp_ara['print'])) {
                        $tmp_print = $tmp_ara['print'];
                    }

                    $tmp_help = '';
                    if (isset($tmp_ara['help'])) {
                        $tmp_help = $tmp_ara['help'];
                    }

                    $field = $this->render_preset_x($tmp_ara['name'], $tmp_print);

                    // $name = '';

                    $value = '';
                    $value = $options[$tmp_ara['name']];
                    /*
                                    if( isset ( $options[$tmp_ara['name']] ) ) {
                                        $value = $options[$tmp_ara['name']];
                                    }
                    */

                    $res = $itls_bulkproductsadd_render->open($field['id'], $field['label'], $tmp_help);

                    switch ($tmp_ara['type']) {

                        case 'tizy':
                            $res.= $itls_bulkproductsadd_render->tizy();
                            break;
                        case 'input':
                            $res.= $itls_bulkproductsadd_render->input($field['id'], $opt.'[' . $field['name'] . ']', $value);
                            break;
                        case 'number':
                            $items = $tmp_ara['items'];
                            $res.= $itls_bulkproductsadd_render->number($field['id'], $opt.'[' . $field['name'] . ']', $value, $items['min'], $items['max'], $items['step']);
                            break;
                        case 'check':
                            if ($value == 1) {
                                $tmp_enabled = __('On');
                            } else {
                                $tmp_enabled = __('Off');
                            }
                            $res.= $itls_bulkproductsadd_render->check($field['id'], $opt . '[' . $field['name'] . ']', $value, $tmp_enabled);
                            break;
                        case 'color':
                            $res.= $itls_bulkproductsadd_render->color($field['id'], $opt.'[' . $field['name'] . ']', $value);
                            break;
                        case 'longtext':
                            $res.= $itls_bulkproductsadd_render->longtext($field['id'], $opt.'[' . $field['name'] . ']', $value);
                            break;
                        case 'media':
                            $res.= $itls_bulkproductsadd_render->media($field['id'], $opt.'[' . $field['name'] . ']', $value);
                            break;
                        case 'multiselect':
                            $field['name']      = $opt."[".$tmp_ara['name']."][]";
                            $xxoptions          = array();

                            foreach ($tmp_ara['items'] as $k => $v) {
                                $selected = '';
                                if (!empty($value)) {
                                    $selected = (in_array($k, $value)) ? $itls_bulkproductsadd_render->multiselect_selected() : '';
                                }
                                $xxoptions[] = $itls_bulkproductsadd_render->multiselect_option($k, $v, $selected);
                            }
                            $res.= $itls_bulkproductsadd_render->multiselect($field['id'], $field['name'], $xxoptions);
                        break;

                        case 'dropdown':
                            $xxoptions          = array();
                            $tmp_option         = '';

                            foreach ($tmp_ara['items'] as $v => $k) {
                                $selected = '';
                                if ($v == $value) {
                                    $selected = $itls_bulkproductsadd_render->dropdown_selected();
                                }
                                $xxoptions[] = $itls_bulkproductsadd_render->dropdown_option($k, $v, $selected);
                            }

                            if (!empty($xxoptions)) {
                                $tmp_option = implode('', $xxoptions);
                            }

                            $res.= $itls_bulkproductsadd_render->dropdown($field['id'], $opt.'[' . $field['name'] . ']', $tmp_option);
                            break;

                    }

                    $res.= $itls_bulkproductsadd_render->close();
                    echo $res;
                }

//                echo '</table></div></div>';

                echo '</table></div>';
            }

//            echo '</div></div>';
        }

        public function render_preset_x($option, $print='')
        {
            global $itls_bulkproductsadd_functions, $itls_bulkproductsadd_x1x_data;
            $field['id']        = $itls_bulkproductsadd_x1x_data['url_prefix'].'-'.$option;

            if ($print=='') {
                $field['label'] = __($itls_bulkproductsadd_functions->slug2text($option));
            } else {
                $field['label'] = __($print);
            }

            $field['name']      = $option;

            return $field;
        }
    }
}
