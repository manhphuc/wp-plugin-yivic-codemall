<?php
declare( strict_types = 1 );

namespace Yivic\Yivic_Codemall\App\Controllers;

use Yivic\Yivic_Codemall\App\WP\Yivic_Codemall_WP_Plugin;
use Yivic_Base\Foundation\Http\Base_Controller;

class Yivic_Codemall_Controller extends Base_Controller {
	public function hello( Yivic_Codemall_WP_Plugin $yivic_codemall_wp_plugin ) {
		return $yivic_codemall_wp_plugin->view( 'codemall/hello' );
	}
}