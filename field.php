<?php

use Carbon_Fields\Carbon_Fields;
use Carbon_Field_Password\Password_Field;

$constant_name = 'Carbon_Field_Password\\DIR';
if (!defined($constant_name)) {
	define($constant_name, __DIR__);
}

require_once __DIR__ . '/core/Password_Field.php';

Carbon_Fields::extend( Password_Field::class, function( $container ) {
	return new Password_Field(
		$container['arguments']['type'],
		$container['arguments']['name'],
		$container['arguments']['label']
	);
} );
