<?php
declare( strict_types = 1 );

namespace Yivic\Yivic_Codemall\App\Controllers;

use Yivic_Base\Foundation\Http\Base_Controller;
use Illuminate\Http\JsonResponse;

class Yivic_Codemall_Api_Controller extends Base_Controller {
	public function hello(): JsonResponse {
		return response()->json(
			[
				'message' => 'Welcome to Yivic Codemall API',
			]
		);
	}
}