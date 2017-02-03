<?php
	include('database.php');

	$hash = $_REQUEST['hash'];
	$id = $_REQUEST['id'];
	$name = $_REQUEST['name'];
	$score = $_REQUEST['score'];
	$level = $_REQUEST['level'];
	$difficulty = $_REQUEST['difficulty'];
	$lives = $_REQUEST['lives'];
	$audio = $_REQUEST['audio'];
	$time = date('Y-m-d H:i:s', strtotime('now'));

	$theHash = md5($_GET['id']. $Key);
	
	if($theHash == $hash)
	{
		$stmt = $db->prepare('INSERT INTO data (id, name, score, level, difficulty, lives, audio, time) VALUES (:ID, :UserName, :Score, :Level, :Difficulty, :Lives, :Audio, :Time)');
		$stmt->bindParam(':ID', $id, PDO::PARAM_INT);
		$stmt->bindParam(':UserName', $name, PDO::PARAM_STR);
		$stmt->bindParam(':Score', $score, PDO::PARAM_INT);
		$stmt->bindParam(':Level', $level, PDO::PARAM_INT);
		$stmt->bindParam(':Difficulty', $difficulty, PDO::PARAM_INT);
		$stmt->bindParam(':Lives', $lives, PDO::PARAM_INT);
		$stmt->bindParam(':Audio', $audio, PDO::PARAM_STR);
		$stmt->bindValue(':Time', $time, PDO::PARAM_STR);
			
		try
			{
				$stmt->execute();
				$lastgameid = $db->lastInsertId();

				$std = $db->prepare('UPDATE devices SET lastgameid=:LastGameID WHERE id=:ID');
				$std ->bindValue(':LastGameID', $lastgameid, PDO::PARAM_INT);
				$std ->bindValue(':ID', $id, PDO::PARAM_INT);

				$std->execute();
			}
		catch(Exception $e)
			{
				echo '<h1>An error has occurred.</h1><pre>', $e->getMessage() ,'</pre>';
			}
	}
	
			foreach($stw = $db->query('SELECT id, lastgameid FROM devices') as $row)
		{
				if($row['id'] == $id)
				echo $row['lastgameid'];
		}
	
	//Close Connection
	$db = null;
?>