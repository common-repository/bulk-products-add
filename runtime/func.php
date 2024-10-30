<?php

if ( !class_exists( 'SunSet2Functions' ) ) {

    class SunSet2Functions {

        public function __construct() {}

        public function fl2name($tmp,$id) {
            $tmp = str_replace(" ","",$tmp);
            $tmp = $tmp . '' . substr($id, -5);
            $tmp = strtolower($tmp);
            return $tmp;
        }

        public function text2slug($tmp,$rep='_') {
            $tmp = str_replace(" ",$rep,$tmp);
            $tmp = strtolower($tmp);
            return $tmp;
        }

        public function slug2text($tmp) {
            $tmp = str_replace("_"," ",$tmp);
            $tmp = ucwords($tmp);
            return $tmp;
        }

        public function font2id($tmp) {
            $tmp = str_replace(" ","+",$tmp);
            return $tmp;
        }

        public function get_json_data($fname,$dt='true') {
            $ct_raw_config = file_get_contents($fname);

            $ct_raw_config = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $ct_raw_config);
            $ct_raw_config = str_replace('\\', '\\\\', $ct_raw_config);
            $ct_arr_config = json_decode($ct_raw_config, $dt);
            return $ct_arr_config;
        }

    }

}
