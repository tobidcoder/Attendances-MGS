<?php
// spl_autoload_register(myAutoloader);
 
//     function myAutoloader($className) {

//         $path = "model/";
//         $extension = ".php";
//         $fullpath =$path . $className . $extension;
//         include_once $fullpath;

//     }

spl_autoload_register(function($className) {
	$file = dirname(__DIR__) . '\\model\\' . $className . '.php';
	$file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
	// echo $file;
	if (file_exists($file)) {
		include $file;
	}
});


?>