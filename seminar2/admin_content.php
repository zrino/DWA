<!--  Sadržaj admin stranice-> lista postojećih vijesti iz baze podataka te moguće akcije nad njima, kao i forma za unos nove vijesti -->

<div id="prodajna_mjesta">
	
<?php 
		if($_SESSION["admin"] == 1)
		{
			echo '<form action="brisi.php" method="POST">';
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
			
			if (!($stmt = $mysqli->prepare("SELECT * FROM Vijesti"))) 
				{
					echo $lang["db_error"];
					exit(1);
				}
				
				if (!$stmt->execute()) 
				{
				    echo $lang["db_error"];
				    
				    exit(3);
				}
				$stmt->bind_result($col1,$col2,$col3,$col4,$col5,$col6);
				
				while ($stmt->fetch()) 
				{
					
				$col1 = htmlentities($col1, ENT_QUOTES | ENT_HTML5, 'UTF-8');
				$col2 = htmlentities($col2, ENT_QUOTES | ENT_HTML5, 'UTF-8');
				$col3 = htmlentities($col3, ENT_QUOTES | ENT_HTML5, 'UTF-8');
				$col4 = htmlentities($col4, ENT_QUOTES | ENT_HTML5, 'UTF-8');
				$col5 = htmlentities($col5, ENT_QUOTES | ENT_HTML5, 'UTF-8');
				$col6 = htmlentities($col6, ENT_QUOTES | ENT_HTML5, 'UTF-8');

					echo '<div class="prodajno_mjesto" id=' .$col1 . '>
					<h4> '. $col3 .'</h4> </br>
					<p>'.  $col4 .' </p>
					<button name="brisi" id='.$col1.' type="submit" value='.$col1.'> ' . $lang["delete"] . ' </button>
					<label for="sakrij">&nbsp </label>';
					if($col6 == 1)
						echo '<button name="prikazi" type="submit" value="'.$col1.'"> ' . $lang["show"] . ' </button>';
					else
						echo '<button name="sakrij" type="submit" value='.$col1.'>' . $lang["hide"] . ' </button>';
					echo '</div>';
				}
			    /* close statement */
			    $stmt->close();
			    echo '</form>
		</div>
	<div id="forma" style="margin-top:0px;">
		<h4> <?php echo $lang["new_message"]; ?> </h4>
		<br>
		<form action="nova_vijest.php" enctype="multipart/form-data" method="POST">
			<label for="naslov"> '.$lang["title"].'</label>
			<input type="text" name="naslov" required> </br>
			<label for="naslov_eng">' .$lang["title_on_eng"] .'</label>
			<input type="text" name="naslov_eng" required> </br>
			<label for="sadrzaj">'.$lang["content"].'</label>
			<input type="text" name="sadrzaj" required></br>
			<label for="sadrzaj_eng">'.$lang["content_on_eng"].'</label>
			<input type="text" name="sadrzaj_eng" required></br>
			<label for="slika">'.$lang["picture"].'</label>
			<input type="hidden" name="MAX_FILE_SIZE" value="4194304"/>
			<input type="file" id="slika" name="slika"/></br>
			<input type="hidden" name="prikazi" value="0" />
			<label for="prikazi">'.$lang["show"].'</label>
			<input type="checkbox" name="prikazi" value="1"> </br><br>
			
			<input type="submit" value="'. $lang["confirm"].'" style="margin-left:106px">
		</form>
	</div>';
		}	
		else
		{
			echo "<br>" . $lang["access_privilege"] ."<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
		}

?>	
		
	