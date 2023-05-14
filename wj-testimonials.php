<?php

/**
* Plugin Name: WJ Testimonials
* Plugin URI: https://www.wordpress.org/WJ-testimonials
* Description: My plugin's description
* Version: 1.0
* Requires at least: 5.6
* Requires PHP: 7.0
* Author: Wassim Jelleli
* Author URI: https://www.codigowp.net
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: wj-testimonials
* Domain Path: /languages
*/
/*
WJ Testimonials is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
WJ Testimonials is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with WJ Testimonials. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( !class_exists( 'WJ_Testimonials' ) ){

    class WJ_Testimonials{

        public function __construct() {

            // Define constants used througout the plugin
            $this->define_constants();  
            
            require_once( WJ_TESTIMONIALS_PATH . 'post-types/wj-testimonials_post_types.php' );
            $WJTestimonialsPostType = new WJ_Testimonials_Post_Type();

            require_once( WJ_TESTIMONIALS_PATH . 'widgets/class.wj-testimonials-widget.php' );
            $WJTestimonialsWidgete = new WJ_Testimonials_Widget();

            add_filter( 'archive_template', array( $this, 'load_testimonials_archive_template' ) );
            add_filter( 'single_template', array( $this, 'load_testimonials_single_template' ) );


        }

         /**
         * Define Constants
         */
        public function define_constants(){
            // Path/URL to root of this plugin, with trailing slash.
            define ( 'WJ_TESTIMONIALS_PATH', plugin_dir_path( __FILE__ ) );
            define ( 'WJ_TESTIMONIALS_URL', plugin_dir_url( __FILE__ ) );
            define ( 'WJ_TESTIMONIALS_VERSION', '1.0.0' );     
        }

        /**
         * Activate the plugin
         */
        public static function activate(){
            update_option('rewrite_rules', '' );
        }

        /**
         * Deactivate the plugin
         */
        public static function deactivate(){
            unregister_post_type( 'wj-testimonials' );
            flush_rewrite_rules();
        }

        /**
         * Uninstall the plugin
         */
        public static function uninstall(){

        }

        public function load_testimonials_archive_template( $tpl ) {
            if ( is_post_type_archive( 'wj-testimonials' ) )
                $tpl = WJ_TESTIMONIALS_PATH . 'views/templates/archive-wj-testimonials.php' ;
            return $tpl;
        }

        public function load_testimonials_single_template( $tpl ) {
            if ( is_singular( 'wj-testimonials' ) )
                $tpl = WJ_TESTIMONIALS_PATH . 'views/templates/single-wj-testimonials.php' ;
            return $tpl;
        }

    }
}

if( class_exists( 'WJ_Testimonials' ) ){
    // Installation and uninstallation hooks
    register_activation_hook( __FILE__, array( 'WJ_Testimonials', 'activate'));
    register_deactivation_hook( __FILE__, array( 'WJ_Testimonials', 'deactivate'));
    register_uninstall_hook( __FILE__, array( 'WJ_Testimonials', 'uninstall' ) );

    $WJ_testimonials = new WJ_Testimonials();
}