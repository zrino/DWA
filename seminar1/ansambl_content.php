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
$sql = "SELECT * FROM Glumci";
$result = $conn->query($sql);
$cnt = 1;
if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
		echo '<section class="section_glumac" id="' . $cnt . '">
		<h2> ' . $row["Ime"] . ' ' . $row["Prezime"] . ' </h2>
		</section> ';
		$cnt+=1;
	}
}
else
{
	echo '0 results';
}



?>
