<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
	<link rel="stylesheet" type="text/css" href="style.css">
        <title>Antigona</title>
	
    </head>
    <body>
	<div id="main">
	
		<div id="header">
			<h2 id="header_text"> Kazalište Antigona </h2> 	
			<a href="eng_sites/index_en.php"> <img src="img/english.png" class="lang_flag" height="25" width="40"> </a>
			
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
				<?php include($page_content); ?>
			</div>
	
		</div>
		<div id="footer">
				 Copyright Zrino Pernar, 2016
		</div>
	</div>
	
		
    </body>
</html>
