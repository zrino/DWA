<!-- Sadrži tekst o kompaniji te mapu s lokacijom kompanije i formu za upit -->

<div id="onama_content">
	<h4> <?php echo $lang["aboutus"] ?> </h4>
		<p><?php echo $lang["about_content"]; ?>
 </p>
</div>
<div id="onama_mapa">
		<br>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2265.299306001583!2d14.435376239669894!3d45.327277818755356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4764a0e038d760ab%3A0xa4ab7c25f6a1a553!2sLuka+Rijeka!5e0!3m2!1shr!2shr!4v1462824953215" width="1140" height="450" style="border:0" allowfullscreen></iframe>
</div>
<div id="forma">
	<br>
	<hr>
		<?php if(isset($_SESSION["question_added"]) && $_SESSION["question_added"] == true)
			{
				echo $lang["question_added"];
				unset($_SESSION["question_added"]);
			}?>
		<h3><?php echo $lang["contactus"] ?></h3>
		<form action="post_upit.php" method="POST">
			
			<label for="ime"> <?php echo $lang["name"] ?> </label>
			<input type="text" id="ime" name="ime" required><br>
			<label for="email"> <?php echo $lang["email"] ?> </label>
			<input type="text" id="email" name="email" required><br><br>
			<label for="upit"> <?php echo $lang["upit"] ?> </label>
			<textarea name="upit" id="upit" cols="70" rows="9" style="vertical-align: text-top;" required></textarea><br><br>
			<input type="submit" value="<?php echo $lang["posalji"] ?>" style="margin-left:106px;">
			</br>
		</form>

</div>