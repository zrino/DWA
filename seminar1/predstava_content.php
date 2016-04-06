<?php


$servername = "localhost";
$username = "root";
$password = "root";
$db = "kazaliste";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$conn->set_charset("utf8");
$sql = "SELECT * FROM Predstave WHERE PID=" . $_GET['pid'];
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
		echo '<section id="' . $cnt . '">
		<h2> ' . $row["Naziv"] . ' </h2>
		<img class="predstava_img" src="img/' . $row["Slika"] . '" width="400" height="300">
		<p> Opis predstave </p>
		<p class="opis"> ' . $row["Opis"] . '</p>
		<h5> Popis glumaca </h5>
		<div class="popis_glumaca"> ';
		
		$sql2 = "SELECT Glumci.ime,Glumci.prezime FROM Glumci INNER JOIN Glumci_Predstave ON Glumci.GID=Glumci_Predstave.GID WHERE Glumci_Predstave.PID=" . $_GET['pid'];
			
		$result2 = $conn->query($sql2);
		if ($result2->num_rows > 0) 
		{
			while($row2 = $result2->fetch_assoc()) 
			{
				echo '
				      <p>' . $row2["ime"] . ' ' . $row2["prezime"] . '</p>';
			}
		}
		else
		{
		echo '0 rezultata' ;
		}
		
		echo '</div>
		      </section>';
	}

}
else
{
	echo '0 results';
}
?>
