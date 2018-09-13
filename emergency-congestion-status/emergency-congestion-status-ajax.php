<?php
  namespace Metatavu\EmergencyCongestionStatus;
  
  defined ( 'ABSPATH' ) || die ( 'No script kiddies please!' );

 
  if (!class_exists( '\Metatavu\EmergencyCongestionStatus\Ajax' ) ) {
  
    /**
     * Ui class
     */
    class Ajax {
      
      /**
       * Constructor
       */
      public function __construct() {
        add_action('wp_ajax_update_emergency_congestion_status', [$this, 'updateEmergencyCongestionStatus']);
      }

      /**
       * Update emergency congestion status
       */
      public function updateEmergencyCongestionStatus () {
        $status = $_POST['data']['status'];
        $option = array('modified' => date("c"), 'value' => $status);
        update_option('emergency_congestion_status', $option);
      }
    }
  }
  add_action ('init', function () {
    new Ajax();
  });
?>