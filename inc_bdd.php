<?php

	define('HOST', 'localhost');
	define('DB', 'projet3');
	define('USER', 'root');
	define('PASSWORD', 'root');

	$db_options = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
	);

	try
	{
		$bdd = new PDO("mysql:host=".HOST.";dbname=".DB, USER, PASSWORD, $db_options);
	}
	catch(Exception $e)
	{
		echo "Erreur SQL";
	}
