<?php
	include("database.php");
	
	$hash = $_GET['hash'];
	$iD = $_GET['id'];
	
	$theHash = md5($_GET['id']. $Key);
	
	if($theHash == $hash)
	{
		$stmt = $db->prepare('SELECT id, gameid FROM data WHERE id=:ID');
		$stmt->execute(array(':ID'=>$id));
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$row_count = $rows->rowCount();
		echo $row_count.' rows selected';

	}
	//Close Connection
	$db = null;
?>