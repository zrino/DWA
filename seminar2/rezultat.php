<?php
/* skripta koja služi za vraćanje vrjednosti iz baze u pretraga.php pomoću AJAX-a*/
	
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
	
	
	if(isset($_GET["date"],$_GET["to"],$_GET["from"]))	//napravi funkciju koja će checkat i isset i empty i moguće vrjednosti 
		nadji_linije_na_dan($mysqli,$_GET["from"],$_GET["to"],$_GET["date"]);
	if(isset($_GET["from"]))	
		nadji_odrediste($mysqli,$_GET["from"]);
	
	
	/* close connection */
	$mysqli->close();
	
	
	
	//pronalaženje mogućih odredišta pomoću ID-a polazišta
	function nadji_odrediste($mysqli,$from)
	{
		$query = "SELECT DISTINCT Odrediste.ID,Odrediste.Naziv FROM Odrediste
			INNER JOIN Linije ON Odrediste.ID=Linije.ID_odredista 
			WHERE Linije.ID_polazista=?";
		
		
		
		if ($stmt = $mysqli->prepare($query)) 
		{
		    $stmt->bind_param('i',$from);
		    /* execute statement */
		    $stmt->execute();
		    $results_destinations = array();
		    $stmt->bind_result($col1,$col2);
		    while ($stmt->fetch()) 
		    {
				
				$col1 = htmlentities($col1, ENT_QUOTES | ENT_HTML5, 'UTF-8');
				$col2 = htmlentities($col2, ENT_QUOTES | ENT_HTML5, 'UTF-8');
			//napravi 2D array, prvi level je indeksirani array drugi je asocijativni
			$results_destinations[] = array('id' => $col1, 'name' => $col2);
			/*$results_id[$c] = $id;
			$results_name[$c] = $name;
			$c++;*/
		    }
			
		    array_walk($results_destinations,'special_chars');
		
			//encode
			$json = html_entity_decode(json_encode($results_destinations));
			//var_dump($results_destinations);
			echo $json;
		    /* close statement */
		    $stmt->close();
		    exit();
		}
		
	}
	
	function nadji_linije_na_dan($mysqli,$from,$to,$date)
	{
		$date = date("Y-m-d",strtotime($date));
		$query = "SELECT Linije.ID,Linije.Vrijeme_polaska FROM Linije
			WHERE Date(Linije.Vrijeme_polaska)=? AND Linije.ID_polazista = ? AND Linije.ID_odredista = ?";
		
		if ($stmt = $mysqli->prepare($query)) 
		{
		    $stmt->bind_param('sii',$date,$from,$to);
		    /* execute statement */
		    $stmt->execute();
		    $results_destinations = array();
		    $stmt->bind_result($col1,$col2);
		    while ($stmt->fetch()) 
		    {
				$col1 = htmlentities($col1, ENT_QUOTES | ENT_HTML5, 'UTF-8');
				//$col2 = htmlentities($col2, ENT_QUOTES | ENT_HTML5, 'UTF-8');
				
				
			//napravi 2D array, prvi level je indeksirani array drugi je asocijativni,KONVERZIJA DATEA U ODREĐENI FORMAT
			$results_destinations[] = array('id' => $col1, 'date' => date("d.m.Y. H:i:s",strtotime($col2)));
			/*$results_id[$c] = $id;
			$results_name[$c] = $name;
			$c++;*/
		    }
		    array_walk($results_destinations,'special_chars');
		
			//encode
			$json = html_entity_decode(json_encode($results_destinations));
			//var_dump($results_destinations);
			echo $json;
		    /* close statement */
		    $stmt->close();
		    exit();
		}
	}
	
	
	
	function special_chars(&$item1, $key)
	{
	    $item1["name"] = htmlentities($item1["name"]);
	}

?>

