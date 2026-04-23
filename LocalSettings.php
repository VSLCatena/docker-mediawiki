<?php

if (!function_exists('getenv_docker')) {
	function getenv_docker($env, $default) {
		if ($fileEnv = getenv($env . '_FILE')) {
			return rtrim(file_get_contents($fileEnv), "\r\n");
		}
		else if (($val = getenv($env)) !== false) {
			return $val;
		}
		else {
			return $default;
		}
	}
}

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for MediaWiki */
define( 'MW_DB_NAME', getenv_docker('MW_DB_NAME', 'wiki') );
define( 'MW_DB_USER', getenv_docker('MW_DB_USER', 'wiki') );
define( 'MW_DB_PASSWORD', getenv_docker('MW_DB_PASSWORD', 'wiki') );
define( 'MW_SITE_SERVER', getenv_docker('MW_SITE_SERVER', 'wiki') );


# Rest of LocalSettings.PHP
