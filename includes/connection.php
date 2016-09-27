<?php
	/*$url = "mysql:host=winnerschapelpretori.ipagemysql.com;dbname=itai";
	$username = "lizzy";
	$password = "report";*/
	$url = "mysql:host=localhost;dbname=waterdb";
	$username = "root";
	$password = "";
	try
	{
		$conn = new PDO($url, $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $ex)
	{	
		echo "Connection failed ". $ex->getMessage();
	}
?>