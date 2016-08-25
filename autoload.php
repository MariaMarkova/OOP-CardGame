<?php

/* function __autoload($class) {	
	$class = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php' ;
	require_once __DIR__ . DIRECTORY_SEPARATOR . $class;
} */

spl_autoload_register(function ($class) {
	$class = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php' ;
	require_once __DIR__ . DIRECTORY_SEPARATOR . $class;
});