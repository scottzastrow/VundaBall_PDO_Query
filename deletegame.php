<?php
	include("database.php");
	
	$hash = $_GET['hash'];
	$iD = $_GET['id'];
	$gameID = $_GET['gameid'];
	
	$theHash = md5($_GET['id']. $Key);
	
	if($theHash == $hash)
	{
		$stmt = $db->prepare('DELETE FROM data WHERE gameid=:GameID');
		$stmt->bindParam(':GameID', $gameID, PDO::PARAM_INT);
		try
		{
			$stmt->execute();
		}
		catch(Exception $e)
		{
			echo '<h1>An error has occurred.</h1><pre>', $e->getMessage() ,'</pre>';
		}
	}
	//Close Connection
	$db = null;
?>