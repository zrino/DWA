<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style.css">
        <title>Antigona</title>
    </head>
    <body>
	<div id="main">
	
		<div id="header">
			<h2 id="header_text"> Theatre Antigona </h2> 	
			
			<a href="../index.php"><img src="../img/croatian.png" class="lang_flag" height="25" width="40"> </a>
		</div>
		<div id="sidebar_content">
			<div id="sidebar">
				<a href="index_en.php">List of shows </a>
				<a href="raspored_en.php">Schedule </a>		
				<a href="ansambl_en.php">Ensemble</a>
				<a href="about_en.php">About</a>
				<a href="contact_en.php">Contact </a>	
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
