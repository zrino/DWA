<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
        <title>Login</title>
    </head>
    <body>
	<div id="main">
	
		<div id="header">
			<h2 id="header_text"> Kazalište Antigona </h2> 
		</div>
		<div id="sidebar_content">
			<div id="sidebar">
				<a href="index.php">Popis predstava </a>
				<a href="raspored.php">Raspored </a>		
				<a href="ansambl.php">Ansambl</a>
				<a href="about.php">O kazalištu</a>
				<a href="contact.php">Kontakt </a>	
			</div>
			
			<div id="content">
				<?php include($page_content) ?>
			</div>
	
		</div>
		<div id="footer">
				 Copyright Zrino Pernar, 2016
		</div>
	</div>
	
		
    </body>
</html>
