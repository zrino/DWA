  <!-- Podaci o prodajnim mjestima (povućeni iz baze podataka) -->

<div id="prodajna_mjesta">
	
<?php
		$mysqli = new mysqli("localhost", "root", "root", "Seminar2");
		if (mysqli_connect_errno())
		{
		     echo $lang["db_error"];
		    exit();
		}
		 //set charset to utf8
		if (!$mysqli->set_charset("utf8")) 
		{
			 echo $lang["db_error"];
			exit();
		}
		
		if (!($stmt = $mysqli->prepare("SELECT * FROM Prodajna_mjesta"))) 
			{
				echo $lang["db_error"];
				exit(1);
			}
			
			if (!$stmt->execute()) 
			{
			    echo $lang["db_error"];
			    
			    exit(2);
			}
			$stmt->bind_result($col1,$col2,$col3,$col4,$col5,$col6);
			
			while ($stmt->fetch()) 
			{
				echo '<div class="prodajno_mjesto" id=' . $col1 . '>
				<h4> '. $col2 .'</h4> </br>
				<p><label>'.$lang["title"].': </label> '.  $col6 .'</p></br>
				<p> <label>' .$lang["phone_number"].': </label> '.  $col4 .'</p> </br>
				<p> <label>'. $lang["working_hours"].': </label> '.  $col5 .'</p> </br>
				<p> <label> '.$lang["address"].': </label> '.  $col3 .'</p></div>';
			}
			
		    /* close statement */
		    $stmt->close();
		
		
		?>
		
	</div>