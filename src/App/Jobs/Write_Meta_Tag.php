<?php
declare( strict_types = 1 );

namespace Yivic\Yivic_Codemall\App\Jobs;

use Yivic_Base\Foundation\Shared\Traits\Config_Trait;
use Yivic_Base\Foundation\Support\Executable_Trait;

class Write_Meta_Tag {
	use Config_Trait;
	use Executable_Trait;

	private $version;

	public function __construct(array $config ) {
		$this->bind_config( $config, true );
	}

	public function execute(): void {
		$this->handle();
	}

	public function handle(): void {
		printf( '<meta name="generator" content="Yivic Codemall %s" />', esc_attr( $this->version ) );
	}
}