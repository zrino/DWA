 <!-- Header svake stranice (sadrži postavljanje cookie-a, logo, navigaciju i odabir jezika)  -->

 <?php
 session_start();
 
 // provjera treba li se ulogirati ili izlogirati
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true) 
	$loginout = $lang["logout"];
else
	$loginout = $lang["login"];
 

 ?>
	<header>
		<div id="logo">
		<a href="index.php"><img src="img/logo.png" alt="logo"></a>
		</div>	
			<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span> 
		      </button>
		      <p class="navbar-brand">ZM Travelling</p>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
		     <div id="sirina">
		      <ul class="nav navbar-nav">
		     
			<li><a href="index.php">		<?php echo $lang["home"];?></a></li>
			<li><a href="pretraga.php"> 		<?php echo $lang["search"]; 		?></a></li>
			<li><a href="onama.php">		<?php echo $lang["about"]; 		?></a></li> 
			<li><a href="prodajna_mjesta.php">	<?php echo $lang["locations"]; 		?></a></li> 
			<li><a href="rute.php">			<?php echo $lang["routes"]; 		?></a></li> 
		      </ul>
		       </div>
		      <ul class="nav navbar-nav navbar-right">
			<li> <img src="img/hrvatski.png" alt="hrvatski" onclick="setCookie('lang','hrvatski')"></li>
			<li> <img src="img/engleski.png" alt="engleski" onclick="setCookie('lang','engleski')"></li>
			<li><?php
			
			 if(isset($_SESSION["admin"]) && $_SESSION["admin"] == 1)
			{
				echo '<a href="admin.php"> <span class="glyphicon glyphicon-user"> </span>'. $lang["admin"].' </a>';
			}
			else
			{
				echo '<a href="registracija.php"> <span class="glyphicon glyphicon-user"></span>'. $lang["register"].'</a>';
			}
			?></li>
			<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>	<?php echo $loginout; 	?></a></li>
		      </ul>
		    </div>
		  </div>
		</nav>
	
	</header>
	<script>
	
	function setCookie(cname, cvalue)
		{
			var d = new Date();
			d.setTime(d.getTime() + (7*24*60*60*1000));
			var expires = "expires="+d.toUTCString();
			document.cookie = cname + "=" + cvalue + "; " + expires;
			
			window.location.reload()
		}
	</script>
	
