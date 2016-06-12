<?php
/* Forma za kupnju karte kojoj mogu pristupiti samo logirani korisnici */



if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true) 
{
	if(isset($_POST) && !empty($_POST))
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
		
		$query = "SELECT * FROM Linije WHERE ID=?";
		
		
		
		if ($stmt = $mysqli->prepare($query)) 
		{
		    $stmt->bind_param('i',$_POST["kupovina"]);
		    /* execute statement */
		    $stmt->execute();
		    $stmt->bind_result($id,$polaz,$odred,$vrijeme);
		    $stmt->store_result();
		    
		    if($stmt->num_rows > 0)
		    {
			while ($stmt->fetch()) 
			{
				$id = htmlentities($id, ENT_QUOTES | ENT_HTML5, 'UTF-8');
				$polaz = htmlentities($polaz, ENT_QUOTES | ENT_HTML5, 'UTF-8');
				$odred = htmlentities($odred, ENT_QUOTES | ENT_HTML5, 'UTF-8');
				$vrijeme = htmlentities($vrijeme, ENT_QUOTES | ENT_HTML5, 'UTF-8');
				
				//query za polazište
				$query2 = "SELECT * FROM Polaziste WHERE ID = ?";
				if ($stmt2 = $mysqli->prepare($query2)) 
				{
				    
				    $stmt2->bind_param('i',$polaz);
				    $stmt2->execute();
				    $stmt2->bind_result($id2,$polaziste_name);
				
				    $stmt2->store_result();
				    $stmt2->fetch();
					
					$polaziste_name = htmlentities($polaziste_name, ENT_QUOTES | ENT_HTML5, 'UTF-8');
				}
				
				$query3 = "SELECT * FROM Odrediste WHERE ID =?";
				if ($stmt3 = $mysqli->prepare($query3))
				{
				    $stmt3->bind_param('i',$odred);
				    $stmt3->execute();
				    $stmt3->bind_result($id3,$odrediste_name);
				    $stmt3->store_result();
				    $stmt3->fetch();
					
					$odrediste_name = htmlentities($odrediste_name, ENT_QUOTES | ENT_HTML5, 'UTF-8');
				}
			}
		    }
		    else
		    {
			 echo $lang["db_error"];
		    }
		    
		echo "Ulogirani ste kao korisnik<b>  " . $_SESSION['korisnik'] . "</b><br>";
		echo '<div id="forma">
		
			<form action="kupi.php" method="POST">
				<label for="from">'.$lang["starting_point"].'</label>
				<input type="text" name="from"  value='. $polaziste_name . ' readonly> </br>
				<label for="to">' .  $lang["destination"] . '</label>
				<input type="text" name="to" value='. $odrediste_name .' readonly></br>
				<label for="date">' . $lang["date"] . '</label>
				<input type="text" name="date" value="'. $vrijeme .'" readonly></br>
				<label for="broj_putnika">' . $lang["number_of_passengers"] . ' </label>
				<input type="number" name="broj_putnika" required></br>
				<label for="povratna" >' . $lang["round-trip_ticket"] . ' </label>
				<input type="checkbox" name="povratna" value="1"></br>
				
				<input type="submit" value=' . $lang["confirm"] .'>
			</form>
		</div>';
		}
		else
			 echo $lang["db_error"];
		
	}
	else
	{
		echo "Pristup stranici je moguć samo preko odabira linije<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	}
		
}
	
else 
	{
		$_SESSION["login_required"] = true;
		header("Location:login.php");
	}

?>
