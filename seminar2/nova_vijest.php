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
	<title>ZM</title>
</head>
<body>
<?php
	session_start();

	if(isset($_COOKIE["lang"]))			// check if COOKIE lang is set, if not default to croatian
	{
		switch($_COOKIE["lang"])
		{
			case "hrvatski":
				include("lang/hrvatski.php");
				break;
			case "engleski":
				include("lang/engleski.php");
				break;
			default:
				include("lang/hrvatski.php");
				break;
		}
		
	}
	else
	{
		$_COOKIE["lang"] = "hrvatski";
		include("lang/hrvatski.php"); 
	}
	if(!empty($_POST["naslov"]) && !empty($_POST["naslov_eng"]) && !empty($_POST["sadrzaj"]) && !empty($_POST["sadrzaj_eng"]) && is_numeric($_POST["prikazi"]))
	{
		
		if($_POST["prikazi"]==0 || $_POST["prikazi"]==1)
		{
		//konekcija na bazu podataka
		$mysqli = new mysqli("localhost","root","root","Seminar2");
		/* check connection */
		if (!$mysqli) {
		    echo $lang["db_error"];
			exit(0);

		}
		 //set charset to utf8
		if (!$mysqli->set_charset("utf8")) 
		{
			 echo $lang["db_error"];
			exit(1);
		}
		/* dodavanje vijesti na hrvatskom*/
		dodaj_vijest_na_jeziku($mysqli,"hrv",$_POST["naslov"],$_POST["sadrzaj"],$_FILES['slika']['name'],!isset($_POST["prikazi"]));
		/* dodavanje vijesti na engleskom*/
		dodaj_vijest_na_jeziku($mysqli,"eng",$_POST["naslov_eng"],$_POST["sadrzaj_eng"],$_FILES['slika']['name'],!isset($_POST["prikazi"]));
		header("Location: admin.php");
		}
		
		
		else
		{
			echo $lang["db_error"];
			exit(2);
		}
	
	}
	else
	{
		echo $lang["db_error"];
		exit(2);
	}

	
	
	function dodaj_vijest_na_jeziku($mysqli,$jezik,$naslov,$sadrzaj,$slika,$prikazi)
		{
			
			if (!($stmt = $mysqli->prepare("INSERT INTO Vijesti(ID_jezik,Naslov,Sadržaj,Slika,Sakrij) VALUES (?,?,?,?,?)"))) 
			{
				echo $lang["db_error"];
				exit(3);

			}
			
			if (!$stmt->bind_param('ssssi', $jezik,$naslov,$sadrzaj,$slika,$prikazi)) 
			{
			    echo $lang["db_error"];
				exit(4);

			}

			if (!$stmt->execute()) 
			{
			
			     echo $lang["db_error"];
				 exit(5);

			}
			$target = 'img/'.$slika;
			if(!file_exists ($target)) // not secure
				if(!move_uploaded_file($_FILES['slika']['tmp_name'],$target))
				{echo $lang["db_error"];

				}
			
		}
?>
</body>
</html>