<?php

if ( !class_exists( 'SunSet4Render' ) ) {

    class SunSet4Render {

        public function __construct() {}

        public function alert( $id,$class,$msg ) {
            return '<div id="'.$id.'" class="'.$class.' notice notice-success is-dismissible below-h2"><p>'.__( $msg ).'.</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';
        }

        public function open( $id, $label, $help ) {
            return '<tr valign="top"><th scope="row"><hr><label for="' . $id . '">' . $label . '</label></th><td><br /><div class="ct_adhelp">'. $help .'</div><br />';
        }

        public function close() {
            return '</td></tr>';
        }

        public function tizy( ) {
            return '';
        }

        public function input( $id, $full_name, $value ) {
            return '<input type="text" size="40" id="' . $id . '" name="' . $full_name . '" value="' . $value . '">';
        }

        public function check( $id, $full_name, $value, $enabled='' ) {
            return '<input class="itls-switch" type="checkbox" id="' . $id . '" name="'.$full_name.'" value="1" '.checked( 1, $value, false ).' /><label for="' . $id . '">'. __('Switch') . ' '.$enabled.'</label>';
        }

        public function number( $id, $full_name, $value, $min, $max, $step ) {
            return '<input type="number" size="10" id="' . $id . '" name="'.$full_name.'" value="'.$value.'" min="' . (string) $min . '" max="' . (string) $max . '" step="' . (string) $step . '" />';
        }

        public function color( $id, $full_name, $value ) {
            return  '<input type="text" value="' . $value . '" id="' . $id . '" name="'.$full_name.'" class="itls-color-picker" />';
        }

        public function longtext( $id, $full_name, $value ) {
            $cols = 40;
            return  '<textarea name="'.$full_name . '" id="' . $id . '" rows=6 cols=' . $cols . '>' . esc_textarea($value) . '</textarea>';
        }

        public function media( $id, $full_name, $value ) {

            return '<input type="text" id="' . $id . '" name="' . $full_name . '" value="' . $value . '" size="40" /><input type="button" class="itls-media-upload-button button" value="Upload Image" /><br /><br /><div style="min-height: 100px;"><img class="img_prev" style="max-width:50%;" src="'. esc_url( $value ) .'" /></div>';
        }

        public function multiselect( $id, $full_name, $xxoptions ) {
            $multiple   = ' multiple="multiple"';
            $size       = ' size="10"';
            return '<select name="' . $full_name . '" style="width:340px;" id="' . $id . '" ' . $size . $multiple . '>' . implode( '', $xxoptions ) . '</select>';
        }

        public function dropdown( $id, $full_name, $tmp_option ) {

            return '<select name="' . $full_name . '" style="width:340px;" id="' . $id . '">' . $tmp_option . '</select>';
        }

        public function multiselect_selected( ) {
            return ' selected="selected"';
        }

        public function multiselect_option( $k, $v, $selected ) {
            return '<option value="' . $k . '"' . $selected . '>' . $v . '</option>';
        }

        public function dropdown_selected( ) {
            return ' selected';
        }

        public function dropdown_option( $k, $v, $selected ) {
            return '<option'.$selected.' value="' . $v . '">' . $k . '</option>';
        }
    }
}
