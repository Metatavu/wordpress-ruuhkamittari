<?php
  namespace Metatavu\EmergencyCongestionStatus;
  
  defined ( 'ABSPATH' ) || die ( 'No script kiddies please!' );

 
  if (!class_exists( '\Metatavu\EmergencyCongestionStatus\Ui' ) ) {
  
    /**
     * Ui class
     */
    class Ui {
      
      /**
       * Constructor
       */
      public function __construct() {
        add_action('admin_init', [$this, 'registerScripts']);
        add_action('admin_menu', [$this, 'processAdminMenuItems']);
      }

      /**
       * Register scripts
       */
      public function registerScripts() {
        wp_enqueue_style('admin-styles', plugins_url('styles/css/styles.min.css' , __FILE__));
        wp_register_script('emergency-congestion-status-script', plugins_url('js/bundle/emergency-congestion-status.min.js' , __FILE__ ), ['jquery'], '1.0.0', true);
        wp_localize_script('emergency-congestion-status-script', 'ruuhkamittari', ['ajaxurl' => admin_url( 'admin-ajax.php' )]);
        wp_enqueue_script('emergency-congestion-status-script');
      }

      /**
       * Show and hide in admin menu
       */
      public function processAdminMenuItems() {
        add_menu_page(
          __('Emergency congestion status', 'ruuhkamittari'), 
          __('Emergency congestion status', 'ruuhkamittari'), 
          'manage_options', 'emergency-congestion-status.php', 
          '', 
          'dashicons-calendar-alt', 
          50
        );
        add_submenu_page(
          __('Emergency congestion status', 'ruuhkamittari'), 
          __('Emergency congestion status', 'ruuhkamittari'), 
          __('Emergency congestion status', 'ruuhkamittari'), 
          'manage_options', 
          'emergency-congestion-status.php', 
          [$this, 'renderEmergencyCongestionStatus']
        );
      }

      /**
       * Renders HTML elements for emergency congestion status
       */
      public function renderEmergencyCongestionStatus () {
        echo '<div class="slider-wrapper">';
        echo sprintf('<h1>%s</h1>', __('Emergency congestion status', 'ruuhkamittari'));

        echo '<div class="slidecontainer">';
        echo sprintf('<input type="range" min="1" max="100" value="%s" class="slider" id="emergencyCongestionStatus">', $status);
        echo '</div>';

        echo sprintf('<button type="submit" id="saveEmergencyCongestionStatus">%s</button>', __('Save', 'ruuhkamittari'));
        echo '</div>';
      }
    }
  }
  
  add_action ('init', function () {
    new Ui();
  });
?>