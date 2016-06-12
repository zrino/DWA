<!-- Forma za registraciju korisnika -->

<div id="forma">
	
		<form action="register.php" method="POST">
			<label for="ime"><?php echo $lang["name"]?></label>
			<input type="text" name="ime" required> </br>
			<label for="prezime"><?php echo $lang["surname"]?></label>
			<input type="text" name="prezime"required></br>
			<label for="adresa"><?php echo $lang["address"]?></label>
			<input type="text" name="adresa"required></br>
			<label for="mjesto"><?php echo $lang["place"]?></label>
			<input type="text" name="mjesto"required></br>
			<label for="post_broj"><?php echo $lang["postal_code"]?></label>
			<input type="text" name="post_broj"required></br>
			<label for="telefon"><?php echo $lang["phone_number"]?></label>
			<input type="text" name="telefon"required></br>
			<label for="email"><?php echo $lang["email"]?></label>
			<input type="text" name="email"required></br>
			<label for="username"><?php echo $lang["username"]?></label>
			<input type="text" name="korisnik"required></br>
			<label for="lozinka"><?php echo $lang["password"]?></label>
			<input type="password" name="lozinka"required></br>
			</br>
			<input type="submit" value="Potvrdi">
		</form>
	</div>
