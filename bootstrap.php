<?php

if (debug) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

//Initialize the Config File
if (file_exists(DOT . '/config/config.php')) {
	include(__DIR__ . '/config/config.php');

	require __DIR__ . '/vendor/autoload.php';

	$Route = new Apps\Route;
	$Core = new Apps\Core;
	$Template = new Apps\Template;

	if ($Template->auth) {
	}
} else {
	die('config.php not found!');
}
