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
$sql = "SELECT Raspored.Datum,Raspored.Cijena,Predstave.Naziv,Predstave.PID FROM Raspored INNER JOIN Predstave ON Raspored.PID=Predstave.PID ORDER BY Raspored.Datum";
$result = $conn->query($sql);
$cnt = 1;
if ($result->num_rows > 0) 
{
	setlocale(LC_ALL,'croatian'); 
	while($row = $result->fetch_assoc()) 
	{
		$time = strtotime($row["Datum"]);
		$myFormatForView = date("d.m G:i ", $time);
		echo '<section class="section_raspored" id="' . $cnt . '">
		<a href="predstava_en.php?pid=' . $row["PID"] . '"> <h2> ' . $row["Naziv"] . ' </h2>
		 </a>
		<p class="datum">' . $myFormatForView . '</p>
		<p class="cijena">' . $row["Cijena"] . ' kn</p>
		</section>';
		$cnt+=1;
	}
}
else
{
	echo '0 results';
}
?>

