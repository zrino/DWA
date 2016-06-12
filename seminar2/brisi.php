<?php
	//konekcija na bazu podataka
	$mysqli = new mysqli("localhost","root","root","Seminar2");
	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	 //set charset to utf8
	if (!$mysqli->set_charset("utf8")) 
	{
		printf("Error loading character set utf8: %s\n", $mysqli->error);
		exit();
	}
	if(isset($_POST["brisi"]))
	{
		if (!($stmt = $mysqli->prepare("DELETE FROM Vijesti WHERE ID=? "))) 
		{
			echo $lang["db_error"];
			exit(1);
		}
		$stmt->bind_param("d",$_POST["brisi"]);
		if (!$stmt->execute()) 
		{
		    echo $lang["db_error"];
		    
		    exit(3);
		}
		
	
	}
	else if(isset($_POST["sakrij"]))
	{
		if (!($stmt = $mysqli->prepare("UPDATE Vijesti SET Sakrij=1 WHERE ID=? "))) 
		{
			echo $lang["db_error"];
			exit(1);
		}
		$stmt->bind_param("d",$_POST["sakrij"]);
		if (!$stmt->execute()) 
		{
		    echo $lang["db_error"];
		    
		    exit(3);
		}
	
	}
	else if(isset($_POST["prikazi"]))
	{
		if (!($stmt = $mysqli->prepare("UPDATE Vijesti SET Sakrij=0 WHERE ID=? "))) 
		{
			echo $lang["db_error"];
			exit(1);
		}
		$stmt->bind_param("d",$_POST["prikazi"]);
		if (!$stmt->execute()) 
		{
		    echo $lang["db_error"];
		    
		    exit(3);
		}
	}
	
		    /* close statement */
	    $stmt->close();
		
	header("Location: admin.php");
	
		
	
	

?>