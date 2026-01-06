<?php
declare( strict_types = 1 );

namespace Yivic\Yivic_Codemall\App\Support\Traits;

use Yivic\Yivic_Codemall\App\WP\Yivic_Codemall_WP_Plugin;

trait Yivic_Codemall_Trait {
	public function yivic_codemall_wp_plugin(): Yivic_Codemall_WP_Plugin {
		return Yivic_Codemall_WP_Plugin::wp_app_instance();
	}
}