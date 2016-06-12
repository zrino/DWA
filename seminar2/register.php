<!-- Obrađuje registracijski zahtjev -->

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<meta name="Keywords" content="Trajekti, Morske linije, Prijevoz, Putovanja" />
	<meta name="Keywords" content="Ferries, Marine lines, Transportation, Traveling" />
	<meta name="Author" content="Marko Pavić" />
	<meta name="Author" content="Zrino Pernar" />
	<meta charset="utf8"/>
	<title><?php echo $lang["search"]; ?></title>
</head>
<body>
<?php
	if(!empty($_POST["ime"]) && !empty($_POST["prezime"]) && !empty($_POST["adresa"]) &&
	!empty($_POST["mjesto"]) && !empty($_POST["post_broj"]) && !empty($_POST["telefon"]) &&
	!empty($_POST["email"]) && !empty($_POST["korisnik"]) && !empty($_POST["lozinka"]))
	{
		
		$mysqli = new mysqli("localhost", "root", "root", "Seminar2");
		if ($mysqli->connect_errno) 
		{
		     echo $lang["db_error"];
		}
		if(!$mysqli->set_charset("utf8"))
		{
			 echo $lang["db_error"];
		}
		
			/* Prepared statement, stage 1: prepare */
			if (!($stmt = $mysqli->prepare("INSERT INTO Korisnici(Ime,Prezime,Adresa,Mjesto,Poštanski_broj,Telefon,Email,Korisničko_ime,Lozinka,Prava_pristupa) VALUES (?,?,?,?,?,?,?,?,?,?)"))) 
			{
			     echo $lang["db_error"];
			    exit(1);
			}
			//odredi prava pristupa i hashiraj password
			$prava_pristupa = 0;
			$hash = password_hash($_POST["lozinka"],PASSWORD_DEFAULT);
			
			/* Prepared statement, stage 2: bind and execute */
			if (!$stmt->bind_param('sssssssssi', $_POST["ime"],$_POST["prezime"],$_POST["adresa"],$_POST["mjesto"],$_POST["post_broj"],$_POST["telefon"],$_POST["email"],$_POST["korisnik"],$hash,$prava_pristupa)) 
			{
			     echo $lang["db_error"];
			    exit(2);
			}

			if (!$stmt->execute()) 
			{
			     echo $lang["db_error"];
			    exit(3);
			}
			header("Location: login.php");
			
	
	}
	else
	{
		echo "Niste ispunili sve tražene podatke!</br>"; 
		
	}


?>
</body>
</html>
