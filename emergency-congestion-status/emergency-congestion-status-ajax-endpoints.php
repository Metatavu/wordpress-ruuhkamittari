<?php
  namespace Metatavu\EmergencyCongestionStatus\RestEndpoints;
  
  defined ( 'ABSPATH' ) || die ( 'No script kiddies please!' );

  if (!class_exists('\Metatavu\EmergencyCongestionStatus\RestEndpoints')) {
  
    /**
     *  Rest endpoints
     */
    class RestEndpoints {
      
      /**
       * Constructor
       */
      public function __construct() {
        add_action('rest_api_init', [$this, 'addRestEndpoints']);
      }

      /**
       * Add rest endpoints
       */
      public function addRestEndpoints () {
        register_rest_route('emergency/congestion', '/status', [
          'methods' => 'GET',
          'callback' => [$this, 'getEmergencyCongestionStatus'],
        ]);
      }

      /**
       * Get status of emergency congestion
       * 
       * @return Array status of emergency congestion
       */
      public function getEmergencyCongestionStatus () {
        $status = get_option('emergency_congestion_status');
        return $status ? $status : 0;
      }

    }
  }

  add_action ('init', function () {
    new RestEndpoints();
  });
?>