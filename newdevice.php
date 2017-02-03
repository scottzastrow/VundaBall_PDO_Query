<?php
	include("database.php");
	
	$hash = $_GET['hash'];
	$id = $_GET['id'];
	$device = $_GET['device'];
	date_default_timezone_set('America/Chicago'); // CDT
	$time = date('Y-m-d H:i:s', strtotime("now"));

	$theHash = md5($_GET['id'] . $_GET['device'] . $Key);

	if($theHash == $hash)
	{
		$stmt = $db->prepare('INSERT INTO devices (id, device, time ) VALUES (:id, :device, :time)');
		$stmt ->bindValue(':id', $id, PDO::PARAM_STR);
		$stmt ->bindValue(':device', $device, PDO::PARAM_STR);
		$stmt ->bindValue(':time', $time, PDO::PARAM_STR);
		$stmt->execute();

		$lastsysid = $db->lastInsertId();

		echo $lastsysid;

	}
	
	//Close Connection
	$db = null;
?>
