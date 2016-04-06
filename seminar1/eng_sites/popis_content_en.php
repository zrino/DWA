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
$sql = "SELECT * FROM Predstave";
$result = $conn->query($sql);
$cnt = 1;
if ($result->num_rows > 0) 
{
	
	
	while($row = $result->fetch_assoc()) 
	{
		echo '<section id="' . $cnt . '"><a href="predstava_en.php?pid=' . $row["PID"] . '"> 
		<h2>' . $row["Naziv"] . ' </h2></a> 
		</section> ';
		$cnt+=1;
	}
}
else
{
	echo '0 results';
}



?>



