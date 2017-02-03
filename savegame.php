<?php
	include("database.php");
	
	$hash = $_REQUEST['hash'];
	$id = $_REQUEST['id'];
	$gameid = $_REQUEST['gameid'];
	$score = $_REQUEST['score'];
	$level = $_REQUEST['level'];
	$lives = $_REQUEST['lives'];
	$audio = $_REQUEST['audio'];
	$rawtime = $_REQUEST['time'];
	//$time = date('Y-m-d H:i:s', strtotime('now'));
	$time = str_replace("--", " ", $rawtime);
	
	$theHash = md5($_GET['id']. $Key);
	
	if($theHash == $hash)
	{
		$stmt = $db->prepare('UPDATE data SET score=:Score, level=:Level, lives=:Lives, audio=:Audio, time=:Time WHERE gameid=:GameID');
		$stmt->bindParam(':Score', $score, PDO::PARAM_INT);
		$stmt->bindParam(':Level', $level, PDO::PARAM_INT);
		$stmt->bindParam(':Lives', $lives, PDO::PARAM_INT);
		$stmt->bindParam(':Audio', $audio, PDO::PARAM_STR);
		$stmt->bindValue(':Time', $time, PDO::PARAM_STR);
		$stmt ->bindValue(':GameID', $gameid, PDO::PARAM_INT);
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
