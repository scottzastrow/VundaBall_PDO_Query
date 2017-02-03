<?php
    $hostname = 'localhost';
    $name = 'user';
    $password = 'password';
    $database = 'database';
	$Key = 'key';
	
try {
	$db = new PDO('mysql:host='. $hostname .';dbname='. $database, $name, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'Connected successfully '; 
    }
catch(PDOException $e)
    {
    echo 'Connection failed: ' . $e->getMessage();
    }
?>