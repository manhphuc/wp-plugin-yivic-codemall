<?php
declare( strict_types = 1 );

namespace Yivic\Yivic_Codemall\App\WP;

use Yivic\Yivic_Codemall\App\Jobs\Register_Yivic_Codemall_Api_Routes;
use Yivic\Yivic_Codemall\App\Jobs\Register_Yivic_Codemall_Routes;
use Yivic\Yivic_Codemall\App\Jobs\Write_Meta_Tag;
use Yivic_Base\Foundation\WP\WP_Plugin;

class Yivic_Codemall_WP_Plugin extends WP_Plugin {
	public function manipulate_hooks(): void {
		add_action( 'wp_head', [ $this, 'add_meta_tag' ] );

		// We must call the methods `register_routes` and `register_api_routes` here
		app()->register_routes( [ $this, 'register_routes' ] );
		app()->register_api_routes( [ $this, 'register_api_routes' ] );
	}

	public function get_name(): string {
		return 'Yivic Codemall WP Plugin';
	}

	public function get_version(): string {
		return YIVIC_CODEMALL_VERSION;
	}

	public function add_meta_tag(): void {
		// We use this class in the method body to avoid the loading of the class to the memory
		//  the job class is only loaded when the hook actually fires
		Write_Meta_Tag::execute_now(
			[
				'version' => YIVIC_CODEMALL_VERSION,
			]
		);
	}

	public function register_routes(): void {
		Register_Yivic_Codemall_Routes::execute_now();
	}

	public function register_api_routes(): void {
		Register_Yivic_Codemall_Api_Routes::execute_now();
	}
}