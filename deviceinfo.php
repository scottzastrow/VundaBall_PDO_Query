<?php
	include("database.php");
	
	$hash = $_GET['hash'];
	$iD = $_GET['id'];

	$recordMatch = False;

	$theHash = md5($_GET['id'] . $Key);

	if($theHash == $hash)
	{
		$stmt = $db->query('SELECT id FROM devices') or die(mysql_error());
		$id = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
		//var_dump($id);

		foreach($stmt = $db->query('SELECT id FROM devices') as $row)
		{
			if($row['id'] == $iD)
			{
				$recordMatch = True;
				echo "True";
			}

		}
		if($recordMatch == False)
			echo "False";
	}
	
	//Close Connection
	$db = null;
?>
