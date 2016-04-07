<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<meta charset="utf8"> 
	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<main>
	<div id="content">
	Unesite pojam za pretraživanje<input onkeyup="pretrazi()" type="text" name="query" id="query">
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db = "FantasticBeasts_proizvodi";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$conn->set_charset("utf8");
$sql = "SELECT * FROM Proizvodi";
$result = $conn->query($sql);
$cnt = 1;
if ($result->num_rows > 0) 
{
	echo '<table id="tablica" border="1" style="width:100%">
		<tr> 	<th>Naziv </th>
			<th> Opis </th>
			<th> Cijena </th>
		</tr>';
	
	while($row = $result->fetch_assoc()) 
	{
		echo '	<tr>
			<td>' . $row["Naziv"] . '</td>
			<td>' . $row["Opis"] . '</td>
			<td>' . $row["Cijena"] . 'kn </td>
			</tr>';
		$cnt+=1;
	}
	echo '</table>';
}
else
{
	echo '0 results';
}

?>
	</div>
	<div id="footer">
	Copyright Fantastic Beasts 2016
	</div>
</main>

</body>
<footer>
	<script>
		function pretrazi()
		{
			var str = document.getElementById("query").value;
			var table = document.getElementById("tablica");
			if(str) //ako je value određen filtriraj
			{
				for(var i = 0; i < table.rows.length; i++)
				{
					
					for(var j = 0; j < table.rows[i].cells.length; j++)
					{
						
						if (table.rows[i].cells[j].textContent.search(str) == -1 && i > 0)
						{
						
							table.rows[i].cells[j].style="visibility:hidden";
						}
						else
						{
							table.rows[i].cells[j].style="visibility:visible";
						}
					}
				}
			}
			else //ako je box prazan, prikaži sve rezultate ponovno
			{
				for(var i = 0; i < table.rows.length; i++)
				{
					for(var j = 0; j < table.rows[i].cells.length; j++)
					{
							table.rows[i].cells[j].style="visibility:visible";
						
					}
				}
			}		
		}
	</script>
</footer>
