<?php
/**
 * 3 Card Tarot Spread
 *
 * @package       3CARDTAROT
 * @author        Jaclyn Rubly
 * @license       gplv2
 * @version       1.1
 *
 * @wordpress-plugin
 * Plugin Name:   3 Card Tarot Spread
 * Plugin URI:    https://www.506studios.com/tarotplugin
 * Description:   A simple 3 card spread to embed into your WordPress theme.
 * Version:       1.1
 * Author:        Jaclyn Rubly
 * Author URI:    https://www.506studios.com
 * Text Domain:   3-card-tarot-spread
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with 3 Card Tarot Spread. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * HELPER COMMENT START
 * 
 * This file contains the main information about the plugin.
 * It is used to register all components necessary to run the plugin.
 * 
 * The comment above contains all information about the plugin 
 * that are used by WordPress to differenciate the plugin and register it properly.
 * It also contains further PHPDocs parameter for a better documentation
 * 
 * The function 3CARDTAROT() is the main function that you will be able to 
 * use throughout your plugin to extend the logic. Further information
 * about that is available within the sub classes.
 * 
 * HELPER COMMENT END
 */

// Plugin name
define( '3CARDTAROT_NAME',			'3 Card Tarot Spread' );

// Plugin version
define( '3CARDTAROT_VERSION',		'1.1' );

// Plugin Root File
define( '3CARDTAROT_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( '3CARDTAROT_PLUGIN_BASE',	plugin_basename( 3CARDTAROT_PLUGIN_FILE ) );

// Plugin Folder Path
define( '3CARDTAROT_PLUGIN_DIR',	plugin_dir_path( 3CARDTAROT_PLUGIN_FILE ) );

// Plugin Folder URL
define( '3CARDTAROT_PLUGIN_URL',	plugin_dir_url( 3CARDTAROT_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once 3CARDTAROT_PLUGIN_DIR . 'core/class-3-card-tarot-spread.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  Jaclyn Rubly
 * @since   1.1
 * @return  object|3_Card_Tarot_Spread
 */
function 3CARDTAROT() {
	return 3_Card_Tarot_Spread::instance();
}

3CARDTAROT();
