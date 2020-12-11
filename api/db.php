<?php
	//Connecting the database 
	$host = "localhost"; //Server where the database is located
	$db="autocomplate"; //The database name
	$user="root"; //The Database Username
	$pw=""; //The Database password
	$charset="utf8"; //You required a charset for right CRUD process. you can search the internet for character sets that support your language

	$pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pw); //Database connection
	$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

	//Bypass Access Control Allow Origin Error
	header("Access-Control-Allow-Origin: Access-Control-Allow-Origin: *");
?>