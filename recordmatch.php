<?php
	include('database.php');
	
	$hash = $_REQUEST['hash'];
	$id = $_REQUEST['id'];
	
	$theHash = md5($_GET['id']. $Key);
	
	if($theHash == $hash)
	{
		$stmt = $db->prepare('SELECT gameid, id, name, score, level, difficulty, lives, audio, time FROM data WHERE id=:ID');
		$stmt ->bindParam(':ID', $id, PDO::PARAM_INT);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
 
		if(count($rows) > 0)
		{
			$i = 0;
			foreach($rows as $r)
			{
				echo $r['gameid'], "*", $r['name'], "*", $r['score'], "*", $r['level'], "*", $r['difficulty'], "*",$r['lives'],"*", $r['audio'], "*", $r['time'],"*";
			}
		}
		else
			echo 'null';
		
	}
	//Close Connection
	$db = null;
?>