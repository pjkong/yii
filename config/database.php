<?php

$env = array_merge($_ENV, $_SERVER);
ksort($env);

$dbHost = $env['componentsMySqlHost'];

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => "mysql:host={$dbHost};dbname={$env['componentsMySqlDatabase']}",
	'emulatePrepare' => true,
	'username' => $env['componentsMySqlUser'],
	'password' => $env['componentsMySqlPassword'],
	'charset' => 'utf8',
	
);