<!-- Sadrži hero image i popis najnovijih vijesti -->

<?php             

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
		if(strcmp($_COOKIE["lang"],"hrvatski") === 0)
		{
			$db_lang = "hrv";
		}
		else if(strcmp($_COOKIE["lang"],"engleski") === 0)
		{
			$db_lang = "eng";
		}
		else //po defaultu je hrvatski
		{
			$db_lang = "hrv";
		}
		$query = "SELECT ID,Naslov,Sadržaj,Slika FROM Vijesti WHERE ID_jezik = " . $db_lang;
		if (!($stmt = $mysqli->prepare("SELECT ID,Naslov,Sadržaj,Slika FROM Vijesti WHERE ID_jezik = ? AND Sakrij = 0"))) 
			{
				echo $lang["db_error"];
				exit(1);
			}
			if(!$stmt->bind_param("s",$db_lang))
			{
				echo $lang["db_error"];
				exit(2);
			}
			if (!$stmt->execute()) 
			{
			    echo $lang["db_error"];
			    
			    exit(3);
			}
			$stmt->bind_result($col1,$col2,$col3,$col4);
			
			while ($stmt->fetch()) 
			{
				$col1 = htmlentities($col1, ENT_QUOTES | ENT_HTML5, 'UTF-8');
				$col2 = htmlentities($col2, ENT_QUOTES | ENT_HTML5, 'UTF-8');
				$col3 = htmlentities($col3, ENT_QUOTES | ENT_HTML5, 'UTF-8');
				$col4 = htmlentities($col4, ENT_QUOTES | ENT_HTML5, 'UTF-8');	
				
				$results[] = array('id' => $col1, 'naslov' => $col2, 'sadrzaj' => $col3, 'slika' => $col4);
			}
		    /* close statement */
		    $stmt->close();


?>

<div id="hero image">
	<img src="img/ferries.png" alt="hero_image_ferrie" width="100%" height="520px">
</div>

	
<div id="vijesti">
	
	<h1><?php echo $lang["news"]?></h1>
	
	<?php for($i = 0; $i < count($results); $i++)
	{
	echo "<div class='vijest'>
	<h3>" . $results[$i]["naslov"] ." </h3><p>";
	if(!empty( $results[$i]["slika"] ))
		echo "<img src='img/" . $results[$i]["slika"] ."' ALIGN='right'> <br />";
	echo $results[$i]["sadrzaj"] . "</p> </div>";
	}
	?>
</div>
