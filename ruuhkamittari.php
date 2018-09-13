<?php
/*
 * Created on Aug 29, 2018
 * Plugin Name: Ruuhkamittari
 * Description: Wordpress plugin for changing status of emergency congestion
 * Version: 1.0.0
 * Author: Metatavu Oy
 */

defined ( 'ABSPATH' ) || die ( 'No script kiddies please!' );

require_once( __DIR__ . '/emergency-congestion-status/emergency-congestion-status-ajax-endpoints.php');
require_once( __DIR__ . '/emergency-congestion-status/emergency-congestion-status-ui.php');
require_once( __DIR__ . '/emergency-congestion-status/emergency-congestion-status-ajax.php');

add_action('plugins_loaded', function() {
  $path = dirname( plugin_basename(__FILE__) ) . '/lang/';
  load_plugin_textdomain('ruuhkamittari', false, $path );
});

?>