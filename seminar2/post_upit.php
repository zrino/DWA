<?php
/* Pohranjivanje upita u bazu */
	

	session_start();
	
	if(isset($_POST["ime"],$_POST["email"],$_POST["upit"]))	//napravi funkciju koja će checkat i isset i empty i moguće vrjednosti 
	{
		//konekcija na bazu podataka
		$mysqli = new mysqli("localhost","root","root","Seminar2");
		/* check connection */
		if (mysqli_connect_errno()) {
		     echo $lang["db_error"];
		    exit();
		}
		 //set charset to utf8
		if (!$mysqli->set_charset("utf8")) 
		{
			 echo $lang["db_error"];
			exit();
		}
		$query = "INSERT INTO Upiti(Ime,Email,Upit,Datum) VALUES (?,?,?,?)";
		if ($stmt = $mysqli->prepare($query)) 
		{
		    $stmt->bind_param('ssss',$_POST["ime"],$_POST["email"],$_POST["upit"],date("Y-m-d H:i:s")); 
		    /* execute statement */
		    $stmt->execute();
		    
		    
		    if($stmt->affected_rows > 0)
		    {
			$_SESSION["question_added"] = true;
		    }
		    header("Location: onama.php");
		    /* close statement */
		    $stmt->close();
		    exit();
		}
		else
		  echo $lang["db_error"];
		
	}
	

	



?>