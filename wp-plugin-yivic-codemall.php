<?php
/**
 * Plugin Name: Yivic Codemall
 * Plugin URI:  https://yivic.com/wp-plugin-yivic-codemall/
 * Description: Codemall
 * Author:      dev@yivic.com, manhphucofficial@yahoo.com
 * Author URI:  https://yivic.com/yivic-team/
 * Version:     0.0.1
 * License:     MIT
 * License URI: https://mit-license.org/
 * Text Domain: yivic-codemall
 */
use Yivic_Base\App\Support\App_Const;
use Yivic\Yivic_Codemall\App\WP\Yivic_Codemall_WP_Plugin;
use Yivic\Yivic_Codemall\App\Support\Yivic_Codemall_Helper;

// Update these constants whenever you bump the version
//  We put this constant here for the convenience when bump the version
defined( 'YIVIC_CODEMALL_VERSION' ) || define( 'YIVIC_CODEMALL_VERSION', '0.0.1' );

// We want to split all the bootstrapping code to a separate file
// 	for putting into composer autoload and
// 	for easier including on other section e.g. unit test
require_once __DIR__ . DIRECTORY_SEPARATOR . 'yivic-codemall-bootstrap.php';

/**
| We need to check the plugin mandatory requirements first
*/
// It's better to check the prerequisites using the `plugins_loaded`, low priority,
//	rather than the activation hook because there is a case where this plugin is already
//	enabled but then the mandatory prerequisites are disabled after
// We need to use the hook `plugins_loaded` here rather than put to the WP Plugin class
//	because there is the possibility Yivic Base or WooCommerce not loaded
//	and the WP Plugin use the resources from these 2 therefore it may produce errors
add_action(
	'plugins_loaded',
	function () {
		$error_message = '';
		if ( ! Yivic_Codemall_Helper::check_yivic_base_plugin() ) {
			$error_message .= $error_message ? '<br />' : '';
			$error_message .= sprintf( __( 'Plugin <strong>%s</strong> is required.', 'yivic' ), 'Yivic Base' );
		}

		if ( $error_message ) {
			add_action(
				'admin_notices',
				function () use ( $error_message ) {
					$error_message = sprintf(
							__( 'Plugin <strong>%s</strong> is disabled.', 'yivic' ),
							'Yivic Codemall'
						) . '<br />' . $error_message;

					?>
					<div class="notice notice-warning is-dismissible">
						<p><?php echo esc_html( $error_message ); ?></p>
					</div>
					<?php
				}
			);
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
			deactivate_plugins( plugin_basename( __FILE__ ) );
		}

		/**
		| We initiate the plugin later
		 */
		if ( Yivic_Codemall_Helper::check_mandatory_prerequisites() ) {
			// We register Yivic_Codemall_WP_Plugin as a Service Provider
			add_action(
				App_Const::ACTION_WP_APP_LOADED,
				function () {
					Yivic_Codemall_WP_Plugin::init_with_wp_app(
						YIVIC_CODEMALL_PLUGIN_SLUG,
						__DIR__,
						plugin_dir_url( __FILE__ )
					);
				}
			);
		}
	},
	-111
);