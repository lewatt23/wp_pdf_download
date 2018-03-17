<?php


//setting to  install  plugin

if(!defined('WP_UNINSTALL_PLUGIN')){
    exit;
}

global $wpdb;
$wpdb->query("DROP TABLE IF EXISTS `" . $wpdb->prefix . "wpd_data`" );







