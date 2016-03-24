<?php
	
if(empty( $_GET["username"]))
{
	echo "Nije upisano ime korisnika";
}
else
{
	session_start();
	echo '<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<link rel="stylesheet" type="text/css" href="style.css">
			<title>Korisnik</title>
		</head>
		<body>
		<main>
			<div id="header">
				<div id="img_div">
					<img id="logopic" src="fantBeastsLogo.png" alt="logo"/>
				</div>
				<div id="user_div">
					<span id="user_logout"> 
				
					 ' . $_GET["username"] . ' 
				


					<a href="logout.php" id="logout" > Odjava </a> 
					  
					</span>
				</div>	
			</div>
			<div id="sc">

				<div id="sidebar">
					<p>Izbornik </p>
					<p>Opcija 2 </p>
					<p>Opcija 3 </p>
					<p>Opcija 4 </p>
					<p>Opcija 5 </p>	
				</div>
				<div id="content">
					<section>
						<h3> Osobni podaci </h3>
						<p> Ime: 			Zrino  </p>
						<p> Prezime: 		Pernar	</p>
						<p> Mjesto rođenja: 	Grad Zagreb </p>
						<p> Datum rođenja: 	24.07.1994 </p> </br>
					</section>
					<section>						
					<h3> Podaci o školovanju </h3>
						<p> 2001 - 2008 		OŠ Jure Kaštelana  </p>
						<p> 2008 - 2012 		XIII. gimnazija	</p>
						<p> 2012 - do sada	TVZ računarstvo </p> </br> 
					</section>
					<section>
					
					<h3> Znanja i vještine </h3>
						<h4> Web development</h4>
						<p> Poznavane HTML-a ,CSS-a, Javascript-a i PHP </p>
					</section>
				</div>
			</div>
		
		</main>
		<footer>
			
				 Copyright Fantastic beasts, 2016
			</footer>
		</body>
	</html>';
}

?>
