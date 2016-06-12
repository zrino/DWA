<!-- Template svake stranice -->

<body>
 <div class="container">
	<?php
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
	
	?>
	<div><?php include('header.php');?></div>
	<div><?php include($page_content);?></div>
	<div><?php include('footer.php');?></div>
 </div
</body>