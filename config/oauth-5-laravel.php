<?php

return [

	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => '\\OAuth\\Common\\Storage\\Session',

	/**
	 * Consumers
	 */
	'consumers' => [

		'Google' => [
			'client_id'     => '73958398024-43rd1rcechctm4t7c0hicfje2v8d8m87.apps.googleusercontent.com',
			'client_secret' => 'l_X1S3NvTAkuB1nqDqFISh_y',
			'scope'         => ['userinfo_email', 'userinfo_profile'],
		],

	]

];