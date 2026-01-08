<?php
declare( strict_types = 1 );

namespace Yivic\Yivic_Codemall\App\Jobs;

use Yivic\Yivic_Codemall\App\Controllers\Yivic_Codemall_Api_Controller;
use Yivic_Base\Foundation\Support\Executable_Trait;
use Illuminate\Support\Facades\Route;

class Register_Yivic_Codemall_Api_Routes {
	use Executable_Trait;

	public function handle(): void {
		Route::get( 'yivic/codemall', [ Yivic_Codemall_Api_Controller::class, 'hello' ] );
	}

}