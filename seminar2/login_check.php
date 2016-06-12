<!-- Provjera login podataka -->

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
	<title> Login provjera </title>
</head>
<body>
<?php
session_start();
	if(!empty($_POST["korisnik"]) || !empty($_POST["lozinka"]))
	{
		
		$mysqli = new mysqli("localhost", "root", "root", "Seminar2");
		if ($mysqli->connect_errno) 
		{
		    echo  $lang["greska_spajanje_na_bazu"];
		}
		if(!$mysqli->set_charset("utf8"))
		{
			echo "Greška sa postavljanjem charseta";
		}
		
			/* Prepared statement, stage 1: prepare */
		if (!($stmt = $mysqli->prepare("SELECT Lozinka,Prava_pristupa FROM Korisnici WHERE Korisničko_ime = ?"))) 
		{
			    echo $lang["db_error"];
			    exit(1);
		}
			/* Prepared statement, stage 2: bind and execute */
			if (!$stmt->bind_param('s', $_POST["korisnik"])) 
			{
			     echo $lang["db_error"];
			    exit(2);
			}

			if (!$stmt->execute()) 
			{
			    echo $lang["db_error"];
			    exit(3);
			}
			$stmt->store_result();
			if($stmt->num_rows > 0)
			{
			/* bind result variables */
			$stmt->bind_result($hash,$admin);
				while ($stmt->fetch()) 
				{
					if(password_verify($_POST["lozinka"],$hash))
					{
						$_SESSION["authenticated"] = true;
						$_SESSION['korisnik'] = $_POST["korisnik"];
						unset($_SESSION["login_error"]);
						if($admin == true)
						{
							$_SESSION["admin"] = 1;
							header('Location: admin.php');
						}
						else
							header('Location: index.php');
					}
					else
					{
						$_SESSION["login_error"] = "Netočan username ili lozinka";
						header("Location: login.php");
					}
					
				}
			}
			else
			{
				$_SESSION["login_error"] = true; //staviti da se učitava iz langa, to isto u kupovini content na redirekciji
				header("Location: login.php");
			}
			/* close statement */
			$stmt->close();
			$mysqli->close();
	}
	else
	{
		echo "Niste unjeli korisničko ime i lozinku!</br>"; 
		
	}


?>
</body>
</html>
