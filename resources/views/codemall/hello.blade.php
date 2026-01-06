<?php
use Yivic\Yivic_Codemall\App\WP\Yivic_Codemall_WP_Plugin;
?>

@extends('wp-plugin-yivic-codemall::codemall/layout')

@section('content')
    <p>
		<?php
		echo esc_html(
			sprintf(
				__( 'Hello from %s plugin.', 'yivic-codemall' ),
				Yivic_Codemall_WP_Plugin::wp_app_instance()->get_name(),
			)
		);
		?>
    </p>
@endsection