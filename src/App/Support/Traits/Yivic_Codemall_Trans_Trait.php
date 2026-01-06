<?php
declare( strict_types = 1 );

namespace Yivic\Yivic_Codemall\App\Support\Traits;

use Yivic\Yivic_Codemall\App\WP\Yivic_Codemall_WP_Plugin;

trait Yivic_Codemall_Trans_Trait {
	// phpcs:ignore PSR2.Methods.MethodDeclaration.Underscore
	protected function __( $untranslated_message ): string {
		// phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralText
		return __( $untranslated_message, 'yivic-codemall' );
	}
}