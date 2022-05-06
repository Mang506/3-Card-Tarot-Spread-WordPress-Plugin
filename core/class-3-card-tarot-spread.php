<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * HELPER COMMENT START
 * 
 * This is the main class that is responsible for registering
 * the core functions, including the files and setting up all features. 
 * 
 * To add a new class, here's what you need to do: 
 * 1. Add your new class within the following folder: core/includes/classes
 * 2. Create a new variable you want to assign the class to (as e.g. public $helpers)
 * 3. Assign the class within the instance() function ( as e.g. self::$instance->helpers = new 3_Card_Tarot_Spread_Helpers();)
 * 4. Register the class you added to core/includes/classes within the includes() function
 * 
 * HELPER COMMENT END
 */

if ( ! class_exists( '3_Card_Tarot_Spread' ) ) :

	/**
	 * Main 3_Card_Tarot_Spread Class.
	 *
	 * @package		3CARDTAROT
	 * @subpackage	Classes/3_Card_Tarot_Spread
	 * @since		1.1
	 * @author		Jaclyn Rubly
	 */
	final class 3_Card_Tarot_Spread {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.1
		 * @var		object|3_Card_Tarot_Spread
		 */
		private static $instance;

		/**
		 * 3CARDTAROT helpers object.
		 *
		 * @access	public
		 * @since	1.1
		 * @var		object|3_Card_Tarot_Spread_Helpers
		 */
		public $helpers;

		/**
		 * 3CARDTAROT settings object.
		 *
		 * @access	public
		 * @since	1.1
		 * @var		object|3_Card_Tarot_Spread_Settings
		 */
		public $settings;

		/**
		 * Throw error on object clone.
		 *
		 * Cloning instances of the class is forbidden.
		 *
		 * @access	public
		 * @since	1.1
		 * @return	void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', '3-card-tarot-spread' ), '1.1' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.1
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', '3-card-tarot-spread' ), '1.1' );
		}

		/**
		 * Main 3_Card_Tarot_Spread Instance.
		 *
		 * Insures that only one instance of 3_Card_Tarot_Spread exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		1.1
		 * @static
		 * @return		object|3_Card_Tarot_Spread	The one true 3_Card_Tarot_Spread
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof 3_Card_Tarot_Spread ) ) {
				self::$instance					= new 3_Card_Tarot_Spread;
				self::$instance->base_hooks();
				self::$instance->includes();
				self::$instance->helpers		= new 3_Card_Tarot_Spread_Helpers();
				self::$instance->settings		= new 3_Card_Tarot_Spread_Settings();

				//Fire the plugin logic
				new 3_Card_Tarot_Spread_Run();

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( '3CARDTAROT/plugin_loaded' );
			}

			return self::$instance;
		}

		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   1.1
		 * @return  void
		 */
		private function includes() {
			require_once 3CARDTAROT_PLUGIN_DIR . 'core/includes/classes/class-3-card-tarot-spread-helpers.php';
			require_once 3CARDTAROT_PLUGIN_DIR . 'core/includes/classes/class-3-card-tarot-spread-settings.php';

			require_once 3CARDTAROT_PLUGIN_DIR . 'core/includes/classes/class-3-card-tarot-spread-run.php';
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   1.1
		 * @return  void
		 */
		private function base_hooks() {
			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
		}

		/**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   1.1
		 * @return  void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( '3-card-tarot-spread', FALSE, dirname( plugin_basename( 3CARDTAROT_PLUGIN_FILE ) ) . '/languages/' );
		}

	}

endif; // End if class_exists check.