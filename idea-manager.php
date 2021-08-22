<?php
/**
 * Idea Manager
 *
 * @package           PluginPackage
 * @author            Khalid Ahmed
 * @copyright         2021 Khalid Ahmed
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Idea manager
 * Plugin URI:        https://github.com/Khalidwebmail/idea-manager
 * Description:       Manage idea management system that will help to visualize the idea requests currently in the queue along with status.
 * Version:           1.0.0
 * Author:            Khalid Ahmed
 * Author URI:        https://github.com/Khalidwebmail
 * Text Domain:       idea-manager
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

if( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( file_exists( __DIR__.'/vendor/autoload.php' ) ) {
    require_once __DIR__.'/vendor/autoload.php';
}

/**
 * Create schelaton of plucin
 */
final class Idea_Manager {

    /**
     * Plugin version
     */
    public const version = '1.0.0';

    /**
     * Class constructor
     */
    private function __construct() {
        $this->wp_im_define_constant();
        register_activation_hook( __FILE__, [ $this, 'wp_im_activate' ] );
        add_action( 'plugins_loaded', [ $this, 'wp_im_init_plugin' ] );
    }

    /**
     *  Initialize singleton instance
     *
     * @return false|Idea_Manager
     */
    public static function wp_im_init() {
        static $instance  = false;

        if(! $instance) {
            $instance = new self();
        }
        return $instance;
    }

    /**
     * Define required plugins constants
     *
     * @return void
     */
    private function wp_im_define_constant() {
        define( 'WP_IM_VERSION', self::version );
        define( 'WP_IM_FILE', __FILE__ );
        define( 'WP_IM_PATH', __DIR__ );
        define( 'WP_IM_URL', plugins_url('', WP_IM_FILE ) );
        define( 'WP_IM_ASSETS', WP_IM_URL . '/asset' );
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public static function wp_im_init_plugin() {

        if( is_admin() ) {
            new \Idea\Manager\Admin();
        }
    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function wp_im_activate() {
        $installed = get_option( 'wp_im_installed' );
        if( ! $installed ) {
            update_option('wp_im_installed', time() );
        }
        update_option('wp_im_installed', WP_IM_VERSION );
    }
}

/**
 * Initialize the main plugin
 *
 * @return \Idea_Manager
 */
function wp_im_start_idea_manager()
{
    return Idea_Manager::wp_im_init();
}

/**
 * Kick of plugin
 */
wp_im_start_idea_manager();