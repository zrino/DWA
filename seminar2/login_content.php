<!-- Forma za login -->
<?php
	
	if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true) 
	{
		unset($_SESSION['authenticated']);
		unset($_SESSION['korisnik']);
		unset($_SESSION['admin']);
		header("Location:login.php");
	}
	
	
?>
<div id="forma">
	<?php 
		if(isset($_SESSION['login_error']) && $_SESSION["login_error"] == true)
		{
			echo $lang["login_error"]; 
			unset($_SESSION["login_error"]);
		}
		if(isset($_SESSION['login_required']) && $_SESSION["login_required"] == true)
		{
			echo $lang["login_required"]; 
			unset($_SESSION["login_required"]);
		}
			
			?>
		<form action="login_check.php" method="POST">
			<label for="korisnik"><?php echo $lang["username"];?></label>
			<input type="text" name="korisnik" required></br>
			<label for="lozinka"><?php echo $lang["password"]?></label>
			<input type="password" name="lozinka" required></br>
			</br><input type="submit" value="<?php echo $lang["confirm"];?>">
			 </br></br>
			<a href="registracija.html"> <?php $lang["registerYourself"];?></a> 
		</form>
		</br>
		
</div>