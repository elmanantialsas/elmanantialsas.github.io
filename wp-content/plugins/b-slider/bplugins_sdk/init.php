<?php
/**
 * @package     bPlugins
 * @copyright   Copyright (c) 2015, bPlugins LLC.
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU General Public License Version 3
 * @since       1.0.0
 */

 $this_sdk_version = '1.0.0';

 if(!class_exists('BPlugins_SDK')){

    // require all elements
    require_once(dirname(__FILE__).'/require.php');

    class BPlugins_SDK {

        public $prefix = '';
        protected $config = [];
        protected $__FILE__ = __FILE__;
        private $lc = null;
        
        function __construct($__FILE__, $config = WP_B__CONFIG){
            $this->__FILE__ = $__FILE__;
            $config_file = plugin_dir_path( $this->__FILE__ ).basename(__DIR__).'/config.json';
            if(file_exists($config_file)){
                $this->config =  (object) wp_parse_args(json_decode(file_get_contents($config_file)), WP_B__CONFIG);
            }else {
                $this->config =  (object) wp_parse_args($config, WP_B__CONFIG);
            }
            
            $this->prefix = $this->config->prefix ?? '';

            if(\is_admin()){
                if($this->config->features->license){
                    $this->lc = new License($this->config, $__FILE__);
                }
                if($this->config->features->optIn){
                    new Activate($this->config, $__FILE__);
                }
            }else {
                $this->lc = (object) ['isPipe' => true];
            }
            $this->register();
        }
    
        function register(){
            add_action( 'admin_init', [$this, 'register_settings'] );
            add_action( 'rest_api_init', [$this, 'register_settings']);
            add_action('admin_enqueue_scripts', [$this, 'localizeScript']);
            add_action('plugins_loaded', [$this, 'i18n']);
        }

        function i18n(){
            load_plugin_textdomain('bPlugins-sdk', false, plugin_dir_url( __FILE__ ) . '/languages/');
        }

        function register_settings(){
            register_setting( $this->prefix."_pipe", $this->prefix."_pipe", array(
                'show_in_rest' => array(
                    'name' => $this->prefix."_pipe",
                    'schema' => array(
                        'type'  => 'string',
                    ),
                ),
                'type' => 'string',
                'default' => '{}',
                'sanitize_callback' => 'sanitize_text_field',
            )); 

            register_setting( $this->prefix."_pipe", $this->prefix."_pipe", array(
                'show_in_rest' => array(
                    'name' => $this->prefix."_pipe",
                    'schema' => array(
                        'type'  => 'string',
                    ),
                ),
                'type' => 'string',
                'default' => '{}',
                'sanitize_callback' => 'sanitize_text_field',
            ));
        } 

        function localizeScript(){
            wp_localize_script( 'react', $this->prefix."Layer", [
                'ajaxURL' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce( 'wp_ajax' )
            ]);
        }

        public function can_use_premium_feature(){
            return $this->lc->isPipe;
        }

        public function uninstall_plugin( $__FILE__ ){
            deactivate_plugins( plugin_basename( $__FILE__ ) );
        }
    }
 }

    
